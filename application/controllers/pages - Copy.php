<?php
class Pages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('All_Rituals');
		$this->load->model('All_Happenings');
		$this->load->model('All_Medias');
		$this->load->model('All_News');
	}

    public function view($page = 'home'){
		if ( ! file_exists(APPPATH.'views/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
		}

		$video_count = $this->All_Medias->videos_count();
		$important_days_count = $this->All_Happenings->monthly_important_days_count();
		$news_count = $this->All_News->news_count();
		$daily_ritual_count = $this->All_Rituals->daily_rituals_count();
		$monthly_ritual_count = $this->All_Rituals->monthly_rituals_count();
		$photo_count = $this->All_Medias->photo_count();
		$song_count = $this->All_Medias->song_count();
		$mantra_count = $this->All_Medias->mantra_count();

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['video_count'] = $video_count;
		$data['important_days_count'] = $important_days_count;
		$data['news_count'] = $news_count;
		$data['daily_ritual_count'] = $daily_ritual_count;
		$data['monthly_ritual_count'] = $monthly_ritual_count;
		$data['photo_count'] = $photo_count;
		$data['song_count'] = $song_count;
		$data['mantra_count'] = $mantra_count;
		$this->load->helper('url');
		$this->load->view('templates/header', $data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer', $data);
    }
}