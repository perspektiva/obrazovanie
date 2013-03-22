<?php
class GeneratorController extends Controller
{
        /**
         * Генерирование pdf договора
         * 
         * @param int $id - id студента
         * @param string $type 
         * @param string $to - 'pdf' or 'doc' 
         * @return void
         */
        public function actionGenerateDogovor($id, $type, $to='pdf')
        {
                $body = Dogovor::model()->findByAttributes(array('type'=>$type));
                $student = Student::model()->findByPk($id);

                $vars = array(
                        '%student_name_ru%'         => $student->name_ru,
                        '%student_surname_ru%'      => $student->surname_ru,
                        '%student_name_en%'         => $student->name_en,
                        '%student_surname_en%'      => $student->surname_en,
                        '%student_birthday%'        => $student->birthday,
                        '%student_passport_number%' => $student->passport_number,
                        '%student_address%'         => $student->address,

                        '%manager%'                 => $student->manager->name,
                        '%referent%'                => $student->referent->name,

                        '%date%'                    => date('d.m.Y'),
                        '%dogovor%'                 => date('d.m.Y'),
                );

                $out = str_replace(array_keys($vars), $vars, $body->body);

                ($to == 'pdf') ? $this->_generatePdf($out) : $this->_generateWord($out, $body->name);
        }


        private function _generatePdf($out)
        {
                Yii::import('ext.mpdf.*');
                require_once('mpdf.php');

                $mpdf = new mPDF('ru-x', 'A4', '', '', 15,10,20,10,1,1);
                $mpdf->mirrorMargins = 0;
                $mpdf->WriteHtml($out);
                $mpdf->Output();
        }


        private function _generateWord($out, $name)
        {
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment; Filename=".$name.".doc");
            echo '

            <html xmlns:v="urn:schemas-microsoft-com:vml"
            xmlns:o="urn:schemas-microsoft-com:office:office"
            xmlns:w="urn:schemas-microsoft-com:office:word"
            xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
            xmlns="http://www.w3.org/TR/REC-html40">

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

            <head>
            <!--[if gte mso 9]><xml>
             <w:WordDocument>
              <w:View>Print</w:View>
              <w:Zoom>100</w:Zoom>
              <w:SpellingState>Clean</w:SpellingState>
              <w:GrammarState>Clean</w:GrammarState>
              <w:TrackMoves>false</w:TrackMoves>
              <w:TrackFormatting/>
              <w:DrawingGridHorizontalSpacing>6 pt</w:DrawingGridHorizontalSpacing>
              <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
              <w:ValidateAgainstSchemas/>
              <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
              <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
              <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
              <w:DoNotPromoteQF/>
              <w:LidThemeOther></w:LidThemeOther>
              <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
              <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
              <w:Compatibility>
               <w:BreakWrappedTables/>
               <w:SnapToGridInCell/>
               <w:WrapTextWithPunct/>
               <w:UseAsianBreakRules/>
               <w:DontGrowAutofit/>
               <w:SplitPgBreakAndParaMark/>
               <w:DontVertAlignCellWithSp/>
               <w:DontBreakConstrainedForcedTables/>
               <w:DontVertAlignInTxbx/>
               <w:Word11KerningPairs/>
               <w:CachedColBalance/>
              </w:Compatibility>
              <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
              <m:mathPr>
               <m:mathFont m:val="Cambria Math"/>
               <m:brkBin m:val="before"/>
               <m:brkBinSub m:val="--"/>
               <m:smallFrac m:val="off"/>
               <m:dispDef/>
               <m:lMargin m:val="0"/>
               <m:rMargin m:val="0"/>
               <m:defJc m:val="centerGroup"/>
               <m:wrapIndent m:val="1440"/>
               <m:intLim m:val="subSup"/>
               <m:naryLim m:val="undOvr"/>
              </m:mathPr></w:WordDocument>
            </xml><![endif]-->

            <style>
            <!--
             
            @page Section1
                {size:595.3pt 841.9pt;
                margin:36.0pt 36.0pt 36.0pt 36.0pt;
                mso-header-margin:35.4pt;
                mso-footer-margin:35.4pt;
                mso-paper-source:0;}
            div.Section1
                {page:Section1;}
            -->
            </style>
            </head>
            <body style="tab-interval:35.4pt">
                <div class="Section1">
                        '.$out.'
                </div>
            </body>
            </html> 
            ';
        }

}
