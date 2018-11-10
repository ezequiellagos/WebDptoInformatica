<?php

/**
 * 
 */
class FileUploadHelper
{
	private $file;
	private $fileName;
	private $fileTmpName;
	private $fileSize;
	private $fileError;

	private $fileDir;
	private $fileNewName;
	private $fileSizeLimit;
	private $fileTypeLimit;

	private $fileType;
	private $fileDirFile;

	private $isImage;
	public $debug;

	private const KB = 1024;
	private const MB = 1048576;
	private const GB = 1073741824;
	private const TB = 1099511627776;

	
	public function __construct()
	{
		
	}

	public function setup($file, $filename, $dir = '/', $type = [], $isImage = true, $size = 5)
	{
		$this->file          = $file;
		$this->fileName      = $this->file['name'];
		$this->fileTmpName   = $this->file['tmp_name'];
		$this->fileSize      = $this->file['size'];
		$this->fileError     = $this->file['error'];
		
		$this->fileNewName   = $filename;
		$this->fileDir       = $dir;
		$this->fileSizeLimit = $size * self::MB;
		$this->fileTypeLimit = $type;
		
		$this->fileType      = strtolower(pathinfo($this->fileDir . basename($this->fileName), PATHINFO_EXTENSION));
		$this->fileDirFile   = $this->fileDir . basename($this->fileNewName . '.' . $this->fileType);
		
		$this->isImage       = $isImage;
		$this->debug         = [];
	}

	public function upload()
	{

		if ($this->fileError > UPLOAD_ERR_OK) {
			$this->debug[] = "File empty";
			return false;
		}
		
		if ($this->isImage && $this->isImage()) {
			if ($this->isImage === false) {
				if ($this->fileExist()) {
					if ($this->fileSize <= $this->fileSizeLimit) {
						if ($this->validateFormatFile()) {
							if (move_uploaded_file($this->fileTmpName, $this->fileDirFile)) {
								$this->debug[] = "File Ok";
								return true;
							}else{
								$this->debug[] = "Error uploading your file";
								return false;
							}
						}else{
							$this->debug[] = "Format type invalid";
							return false;
						}
					}else{
						$this->debug[] = "File size ir more than {$this->fileSizeLimit}";
						return false;
					}
				}else{
					$this->debug[] = "File no exist!";
					return false;
				}
			} else {
				$this->debug[] = "File is an image, but no proccess for algorithm";
				return false;
			}	
		}else{
			$this->debug[] = "File is not an image";
			return false;
		}
	}

	private function isImage()
	{
		$image = getimagesize($this->fileTmpName);
		if ($image !== false) {
			$this->debug[] = "File is an image {$image['mime']}";
			return true;
		}else{
			$this->debug[] = "File is not an image";
			return false;
		}
	}

	private function fileExist()
	{
		if (file_exists($this->fileDirFile)) {
			$this->debug[] = "File already exists";
			return false;
		}else{
			$this->debug[] = "File not exists"; // borrar
			return true;
		}
	}

	private function validateFormatFile()
	{
		foreach ($this->fileTypeLimit as $key => $value) {
			if ($this->fileType == $value) {
				$this->debug[] = "File format correct: {$value}";
				return true;
			}else{
				$this->debug[] = "File format not supported: {$value}";
			}
		}
		return false;
	}
}