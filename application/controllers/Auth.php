<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Webconfig');
        $this->load->library('session');
	}

	public function index()
	{
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false){

            $config = $this->Webconfig->config();
            $data['title'] = $config['title'];
            $data['meta_description'] = $config['meta_description'];
            $data['keyword'] = $config['keyword'];
            $data['favion'] = $config['favion'];
            $data['logo'] = $config['logo'];

            $data['title2'] = 'Sign In';
            $this->load->view('layout/head', $data);
            $this->load->view('layout/menuhead');
            $this->load->view('auth/login');
            $this->load->view('layout/footers');
        }else{
            //Validasi Success
            $this->_login();
        }
	}

    private function _login()
    {
        $email = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE);

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if($user){
            if($user['is_active'] == 1) {
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    
                    $ip_address = $this->get_client_ip();
                    $data2 = [
                        'users_id' => $user['id'],
                        'ip' => $ip_address
                    ];
                        
                    $this->db->insert('iplog', $data2);
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1){
                        redirect('admin');
                    }else{
                        redirect('user');
                    }
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah !
                    </div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              Account belum aktif !. Silakan cek Email
              </div>');
              redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar !
          </div>');
          redirect('auth');
        }
    }
    
      function get_client_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

	public function register()
	{
        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[users.name]', [
            'is_unique' => 'Username telah digunakan!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email telah digunakan!'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[10]|is_unique[users.nohp]', [
            'is_unique' => 'Nomer Hp telah digunakan!',
            'min_length' => 'Nomer Hp minimal 10 Angkah!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 8 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('pin', 'Pin', 'required|trim|min_length[6]|max_length[6]', [
            'min_length' => 'PIN minimal 6 karakter',
            'max_length' => 'PIN maximal 6 karakter'
        ]);

        if ( $this->form_validation->run() == false) {

            $config = $this->Webconfig->config();
            $data['title'] = $config['title'];
            $data['meta_description'] = $config['meta_description'];
            $data['keyword'] = $config['keyword'];
            $data['favion'] = $config['favion'];
            $data['logo'] = $config['logo'];

        $data['title2'] = 'Sign Up';
        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuhead');
        $this->load->view('auth/register');
        $this->load->view('layout/footers');

        }else{
            $apikey = substr(md5(time()), 0, 40);
           $data = [
               'name' => htmlspecialchars($this->input->post('name', true)),
               'email' => htmlspecialchars($this->input->post('email', true)),
               'nohp' => htmlspecialchars($this->input->post('nohp', true)),
               'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
               'api_key' => $apikey,
               'pin' => htmlspecialchars($this->input->post('pin', true)),
               'role_id' => 2,
               'saldo' => 0,
               'is_active' => 1
           ];
            $data = $this->security->xss_clean($data);
            
           //TOKEN
           $token = base64_encode(random_bytes(32));
           $user_token = [
               'email' => $this->input->post('email', true),
               'token' => $token,
               'date_created' => time()
           ];

       $this->db->insert('users', $data);
       $this->db->insert('users_token', $user_token);

        //    $this->_sendEmail($token, 'verify');

           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Register Berhasil ! Silakan Login untuk melanjutkan
         </div>');
           redirect('auth');
        }
        
	}
  

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'pempek.haiserver.com',
            'smtp_user' => 'admin@ilhsmm.com',
            'smtp_pass' => 'Malang00@@##',
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);

        $this->email->from('admin@ilhsmm.com', 'ADMIN ILHSMM');
        $this->email->to($this->input->post('email'));

        if($type == 'verify'){
            $this->email->subject('Register Berhasil!');
            $this->email->message('Selamat register anda telah berhasil ! Happy Shopping.
            Jika ada kendala silakan hubungi kami!');
        
        }elseif($type == 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to Reset your Password : ' . base_url() . 
            'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . $token .'');
        
        }
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if($user){
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();

            if($user_token){
                if (time() - $user_token['date_created'] < (60 * 60 * 24)){
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');

                    $this->db->delete('users_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Account telah aktif. Silakan Login
                  </div>');
                    redirect('auth');
                }else{

                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('users_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Token Expired !
                   </div>');
                     redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Token Salah !
              </div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account gagal verifikasi !
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Logout !
      </div>');
        redirect('auth');
    }

    public function blocked()
    {
      $this->load->view('404.php');
    }
    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false){
            $config = $this->Webconfig->config();
            $data['title'] = $config['title'];
            $data['meta_description'] = $config['meta_description'];
            $data['keyword'] = $config['keyword'];
            $data['favion'] = $config['favion'];
            $data['logo'] = $config['logo'];

            $data['title2'] = 'Forgot Password';
            $this->load->view('layout/head', $data);
            $this->load->view('layout/menuhead');
            $this->load->view('auth/forgot');
            $this->load->view('layout/footers');
               
        }else{
            $email = $this->input->post('email');

            $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();
            if($user){
           $token = base64_encode(random_bytes(32));
           $user_token = [
               'email' => $email,
               'token' => $token,
               'date_created' => time()
           ];

           $this->db->insert('users_token', $user_token);

           $this->_sendEmail($token, 'forgot');
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Silakan cek email untuk reset password
         </div>');
           redirect('auth/forgotpassword');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak ditemukan Atau tidak aktif !
              </div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email',TRUE);
        $token = $this->input->get('token',TRUE);

        $user = $this->db->get_where('users', ['email' => $email,])->row_array();
        if($user){
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();
            
            if($user_token){
                $this->session->set_userdata('reset_email', $email);

                $this->changePassword();
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset Password Failed ! Token Salah 
              </div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset Password Failed ! Wrong Email
          </div>');
            redirect('auth');
        }
    }

    public function changepassword()
    {

        if(!$this->session->userdata('reset_email')){
            redirect('auth');
        }
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 8 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        
        if ($this->form_validation->run() == false){
            $config = $this->Webconfig->config();
            $data['title'] = $config['title'];
            $data['meta_description'] = $config['meta_description'];
            $data['keyword'] = $config['keyword'];
            $data['favion'] = $config['favion'];
            $data['logo'] = $config['logo'];

            $data['title2'] = 'Change Password';
            $this->load->view('layout/head', $data);
            $this->load->view('layout/menuhead');
            $this->load->view('auth/change-password');
            $this->load->view('layout/footers');
        }else{
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password Berhasil Diubah !
          </div>');
            redirect('auth');
        }
    }
}
