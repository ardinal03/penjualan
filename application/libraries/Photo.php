<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo {	

	protected $ph;

	public function __construct() {
		$this->ph =& get_instance();
	}

	function serialize_photo($folder, $current_foto=NULL) {
		$count 		= count($_FILES['upload']['name']);
		$root_path 	= $folder['root'];
		$path 		= $folder['path'];

		for ($i=0; $i<$count; $i++) {
			$_FILES['image']['name']	 = $_FILES['upload']['name'][$i];
			$_FILES['image']['type'] 	 = $_FILES['upload']['type'][$i];
			$_FILES['image']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
			$_FILES['image']['error'] 	 = $_FILES['upload']['error'][$i];
			$_FILES['image']['size'] 	 = $_FILES['upload']['size'][$i];

			$new_filename	= $this->ph->crypto->gen_crypt(16);
			$config = array(
				'file_name'		=> $new_filename,		
				'upload_path'	=> $path,
				'allowed_types'	=> 'jpg|jpeg|png|gif',
				'overwrite'		=> TRUE
			);

			$this->ph->upload->initialize($config);

			if ( ! is_dir($root_path)) {
				mkdir($root_path, 0777, TRUE);
			}

			$dir_exist = TRUE;
			
			if ( ! is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
				$dir_exist = FALSE;
			}
			else {

			}

			if ( ! $this->ph->upload->do_upload('image')) {
				if (!$dir_exist) {
					rmdir($config['upload_path']);
				}
				$foto = $current_foto;
			}
			else {
				if ($current_foto != NULL) {
					@chmod($config['upload_path'].'/'.$current_foto, 0777);
					@unlink($config['upload_path'].'/'.$current_foto);
				}

				$filedata 	= $this->ph->upload->data();
				$foto[$i]	= $filedata['file_name'];

				$conf['image_library'] 	= 'gd2';
				$conf['source_image'] 	= $config['upload_path'].'/'.$filedata["file_name"];  
				$conf['create_thumb'] 	= FALSE;
				$conf['maintain_ratio'] = TRUE;
				$conf['width']			= 960;
				$conf['height']			= 720;
				$conf['quality']		= '90%';
				$conf['new_image']		= $config['upload_path'].'/'.$filedata["file_name"];
					
				$this->ph->load->library('image_lib');
				$this->ph->image_lib->initialize($conf);
				$this->ph->image_lib->resize();	
			}
		}
		return $foto;
	}
	
	public function delete_file_folder($path) {
		$empty = true;
		
		foreach (glob($path.DIRECTORY_SEPARATOR."*") as $file) {
			$empty &= is_dir($file) && delete_file_folder($file);
		}
		return $empty && rmdir($path);
	}

	public function delete_file_photo($target, $path, $file_data = NULL) {
		@chmod($target, 0777);
		@unlink($target);
		$this->delete_file_folder($path);
		if($file_data != NULL) {
			$delete_file = $this->ph->crud_model->delete_data('file', $file_data);
		}

		if ($delete_file) {
			return TRUE;
		}
	}
}