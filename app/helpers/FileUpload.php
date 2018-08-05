<?php

/**
 * 
 */
class FileUpload
{
	private $file;
	private $fileName;
	private $fileTmpName;
	private $fileSize;
	private $fileError;

	public $fileDir;
	public $fileSizeLimit;
	public $fileTypeLimit;

	private $fileDirFile;
	private $fileType;

	private $isImage;
	public $error;

	private const KB = 1024;
	private const MB = 1048576;
	private const GB = 1073741824;
	private const TB = 1099511627776;

	
	public function __construct($file, $dir = '/', $type = [], $isImage = true, $size = 5)
	{
		$this->file          = $file;
		$this->fileName      = $file['name'];
		$this->fileTmpName   = $file['tmp_name'];
		$this->fileSize      = $file['size'];
		$this->fileError     = $file['error'];
		
		$this->fileDir       = $dir;
		$this->fileSizeLimit = $size * self::MB;
		$this->fileTypeLimit = $type;
		
		$this->fileDirFile   = $this->fileDir . basename($this->fileName);
		$this->fileType      = strtolower(pathinfo($this->fileDirFile, PATHINFO_EXTENSION));
		
		$this->isImage       = $isImage;
		$this->error         = [];
	}

	public function upload()
	{
		if ($this->isImage && $this->isImage()) {
			if ($this->fileExist()) {
				if ($this->fileSize <= $this->fileSizeLimit) {
					if ($this->validateFormatFile()) {
						if (move_uploaded_file($this->fileTmpName, $this->fileDirFile)) {
							$this->error[] = "File Ok";
							return true;
						}else{
							$this->error[] = "Error uploading your file";
							return false;
						}
					}else{
						$this->error[] = "Format type invalid";
						return false;
					}
				}else{
					$this->error[] = "File size ir more than {$this->fileSizeLimit}";
					return false;
				}
			}else{
				return false;
			}
		}else{
			$this->error[] = "File is not an image";
		}

		if ($this->isImage === false) {
			if ($this->fileExist()) {
				if ($this->fileSize <= $this->fileSizeLimit) {
					if ($this->validateFormatFile()) {
						if (move_uploaded_file($this->fileTmpName, $this->fileDirFile)) {
							$this->error[] = "File Ok";
							return true;
						}else{
							$this->error[] = "Error uploading your file";
							return false;
						}
					}else{
						$this->error[] = "Format type invalid";
						return false;
					}
				}else{
					$this->error[] = "File size ir more than {$this->fileSizeLimit}";
					return false;
				}
			}else{
				return false;
			}
		}else{
			$this->error[] = "File is an image, but no proccess for algorithm";
			return false;
		}
	}

	private function isImage()
	{
		$image = getimagesize($this->fileTmpName);
		if ($image !== false) {
			$this->error[] = "File is an image {$image['mime']}";
			return true;
		}else{
			$this->error[] = "File is not an image";
			return false;
		}
	}

	private function fileExist()
	{
		if (file_exists($this->fileDirFile)) {
			$this->error[] = "File already exists";
			return false;
		}else{
			$this->error[] = "File not exists"; // borrar
			return true;
		}
	}

	private function validateFormatFile()
	{
		foreach ($this->fileTypeLimit as $key => $value) {
			if ($this->fileType == $value) {
				$this->error[] = "File format correct: {$value}";
				return true;
			}else{
				$this->error[] = "File format not supported: {$value}";
			}
		}
		return false;
	}
}