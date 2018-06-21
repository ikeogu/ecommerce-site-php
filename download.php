<?php
      include_once 'includes/product.php';
      include_once 'includes/transaction.php';
      include_once 'includes/session.php';
      // include_once 'verify.php';
      $hash = $_GET['code'];
      $product_id = $_GET['id'];
      $dfile = Transaction::Where(array('hash'=>$hash, 'product_id'=>$product_id));
      $product = Product::find($product_id);
      //var_dump($dfile); 
     //var_dump($product); exit();
      $download_path = 'upload/document/'.$product->file;
      $file_to_download = $download_path;

     // file to be downloaded
      header("Expires: 0");
      header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");  header("Content-type: application/file");
      header('Content-length: '.filesize($file_to_download));
      header('Content-disposition: attachment; filename='.basename($file_to_download));
      readfile($file_to_download);
      exit;
      

?>