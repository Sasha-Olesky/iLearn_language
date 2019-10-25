<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use OpenTok\OpenTok;
use OpenTok\Role;
use OpenTok\MediaMode;
use OpenTok\OutputMode;

class Video_chat extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model("simple_model");
		$this->session_model = new Simple_model();
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($data = array ())
	{
		$this->load->view('video_chat', $data);
	}

	public function host_view () 
	{
		$opentok = new OpenTok($this->config->item('opentok_key'), $this->config->item('opentok_secret'));
		$session = $opentok->createSession(array(
      		'mediaMode' => MediaMode::ROUTED
    	));
		$sessionId = $session->getSessionId();
		$this->session_model->insert_item($sessionId);
		$token = $opentok->generateToken($sessionId, array(
        	'role' => Role::MODERATOR
    	));

		$data = array(
				'sessionId' => $sessionId,
				'token' => $token
			);
		$this->index($data);	
	}

	public function participate_view () 
	{
		$opentok = new OpenTok($this->config->item('opentok_key'), $this->config->item('opentok_secret'));
		$session = $opentok->createSession(array(
      		'mediaMode' => MediaMode::ROUTED
    	));
		$sessionId = $this->session_model->get_last_item();
		$token = $opentok->generateToken($sessionId, array(
        	'role' => Role::MODERATOR
    	));
		$data = array(
				'sessionId' => $sessionId,
				'token' => $token
			);
		$this->index($data);
	}
	public function opentok()
    {
        $opentok = new OpenTok($this->config->item('opentok_key'), $this->config->item('opentok_secret'));
        $session = $opentok->createSession();

        $data = array(
            'sessionId' => $session->getSessionId(),
            'token' => $session->generateToken()
        );
        $this->load->view('opentok', $data);
    }
}
