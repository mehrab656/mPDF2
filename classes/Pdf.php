<?php


namespace Classes;

use function write_file;

require_once 'vendor/autoload.php';
require_once 'helper.php';
require_once 'classes/PDFBase.php';

class Pdf extends PDFBase {

	protected $output_type;
	protected $autoScriptToLang;
	protected $autoLangToFont;

	function __construct( $output_type = 'S', $autoScriptToLang = true, $autoLangToFont = true ) {
		parent::__construct( 'Mehrab Hossain', 'mPDF Implementation', 20, 'Mehrab Hossain', 'fullpage', 'This is Header', 'This is Footer' );
		$this->output_type      = $output_type;
		$this->autoScriptToLang = $autoScriptToLang;
		$this->autoLangToFont   = $autoLangToFont;
	}

	function createPdf( $file, $pdfFileName='' ) {
		$mpdf                   = new \Mpdf\Mpdf();
		$mpdf->autoScriptToLang = $this->autoScriptToLang;
		$mpdf->autoLangToFont   = $this->autoLangToFont;

		$mpdf->SetTopMargin( $this->marginTop );
		$mpdf->SetTitle( $this->title );
		$mpdf->SetAuthor( $this->author );
		$mpdf->SetCreator( $this->creator );
		$mpdf->SetDisplayMode( $this->displayMode );


		ob_start();
		include_once $file;
		$content = ob_get_clean();

		//@todo if need to see the debugging , uncomment the line below
//		$mpdf->debug = true;


		$mpdf->WriteHTML( $content );
		$mpdf->SetHTMLHeader( '<p classes="text-center">' . $this->headerText . '</p>', '', true );
		$mpdf->SetHTMLFooter( '<p classes="text-center">' . $this->footerText . '</p>', '', true );

		try {
			$this->savePdf( $mpdf,$pdfFileName );
			//now show the file as output
			$mpdf->Output();
		} catch ( \Mpdf\MpdfException $e ) {
		}
	}

	/**
	 * Save The PDF file in disk
	 *
	 * @param $pdfObject
	 * @param string $name
	 * @param string $dest
	 *
	 * @return void
	 */
	public function savePdf( $pdfObject, string $name = '', string $dest = 'S' ) {
		$fileName     = $name;
		$actionType   = $dest;
		$file_content = $pdfObject->Output( $fileName, $actionType );
		$name         = ! empty( $fileName ) ? $fileName.'.pdf' : ( date( 'Y-m-d H:i:s' ) . '.pdf' );
		write_file( 'Invoices/' . $name, $file_content );
	}
}


