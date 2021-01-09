<?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url('home') ?>">Dashboard</a>
                <a class="breadcrumb-item" href="#">Reports</a>
                <span class="breadcrumb-item active">11 Point Reports</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">11 Point Reports</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">11 Point Reports Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <div class="mt-4" id="mainDivToPrint">
                    <table border="1" class="table text-inverse">
                        <tr>
                            <td colspan="8" align="center" class="h4 text-inverse tx-bold "></b>जिला - धनबाद</td>
                        </tr>
                        <tr>
                            <td colspan="8" align="center" class="h5 text-inverse tx-bold">कोरोना वायरस (COVID-19) से संक्रमण को नियंत्रित करने हेतु किये जाने वाले कार्य संबंधी प्रतिवेदन</td>
                        </tr>
                        <tr>
                            <td colspan="8" align="right" class="h6 text-inverse"><b>दिनांक :-</b> <?php echo date('d-m-Y',) ?></td>
                        </tr>
                        <tr>
                            <td class="tx-bold text-center">क्रम संख्या</td>
                            <td class="tx-bold text-center">बिन्दु</td>
                            <td rowspan="2" class="tx-bold text-center">क्रम संख्या</td>
                            <td colspan="4" class="tx-bold text-center">अनुपालन</td>
                        </tr>
                        <tr>
                            <?php 
                            $count_pone=count($point_one);
                            $count_pone=$count_pone+3;
                            ?>
                            <td rowspan="<?php echo $count_pone;?>" class="text-center">1.</td>
                            <td rowspan="<?php echo $count_pone;?>" class="text-center">जिले में उपलब्ध Quarantine Centre की संख्या एवं वहाँ Quarantine किये गये व्यक्ति</td>
                            <td class="tx-bold">सेन्टर का नाम</td>
                            <td class="tx-bold text-center">बेड की संख्या</td>
                            <td class="tx-bold text-center">Quarantine किये गये व्यक्ति की संख्या</td>
                            <td class="tx-bold text-center">Quarantine समाप्त की संख्या</td>
                        </tr>
                        <?php
                            if (count($point_one)){
                                $sln = 0;
                                foreach ($point_one as $pone) {
                                    $sln = $sln + 1;
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $sln;?></td>
                            <td><?php if($pone->csqcName==""){ echo '0';}else{ echo $pone->csqcName;}?></td>
                            <td class="text-center"><?php if($pone->noBed==""){echo '0';}else{ echo $pone->noBed;} ?></td>
                            <td class="text-center"><?php if($pone->nopIn==""){echo '0';}else{ echo $pone->nopIn;} ?></td>

                            <?php 
                                    if($sln==1){                                        
                                        $compltd=0;
                                        foreach ($point_one as $pone) {
                                            if($pone->nopCompleted==""){
                                                $compltd = $compltd + 0;
                                            }else{ 
                                                $compltd = $compltd + $pone->nopCompleted;
                                            } 
                                        }
                                    ?>
                            <td class="text-center" rowspan="<?php echo count($point_one); ?>"><?php echo $compltd; ?></td>
                            <?php     }  ?>
                        </tr>
                        <?php
                                }
                            }else{ echo 'No Record Found....'; }
                        ?>
                        <tr>
                            <td class="text-center"><?php echo count($point_one)+1;?></td>
                            <td>प्रखंड एवं पंचायत स्तर पर</td>
                            <?php 
                            if (isset($point_one_block)){
                            ?>
                            <td class="text-center"><?php if($point_one_block->noBedInstalled==""){echo '0';}else{ echo $point_one_block->noBedInstalled;} ?></td>
                            <td class="text-center"><?php if($point_one_block->nopGovtQuarantine==""){echo '0';}else{ echo $point_one_block->nopGovtQuarantine;} ?></td>
                            <td class="text-center"><?php if($point_one_block->nopCompleteQrtn==""){echo '0';}else{ echo $point_one_block->nopCompleteQrtn;} ?></td>
                            <?php
                                }else{ echo 'No Record Found....'; }
                            ?>

                        </tr>
                        <tr>
                            <td class="text-center"><?php echo count($point_one)+2;?></td>
                            <td>15 फरवरी, 2020 के बाद बाहर से आनेवाले व्यक्तियों की संख्या</td>
                            <?php 
                            if (isset($point_one_block)){
                            ?>
                            <td class="text-center" colspan="3"><?php if($point_one_block->nopFromOtherCity==""){echo '0';}else{ echo $point_one_block->nopFromOtherCity;} ?></td>
                            <?php
                                }else{ echo 'No Record Found....'; }
                            ?>
                        </tr>
                        <tr>
                            <td class="text-center">2.</td>
                            <td colspan="2">Home Quarantine के अन्तर्गत रखे गए व्यक्ति</td>
                            <?php 
                            if (isset($point_one_block)){
                            ?>
                            <td colspan="5"><?php if($point_one_block->nopHomeQuarantine==""){echo '0';}else{ echo $point_one_block->nopHomeQuarantine;} ?></td>
                            <?php
                                }else{ echo 'No Record Found....'; }
                            ?>
                        </tr>
                        <tr>
                            <td class="text-center">3.</td>
                            <td colspan="2">Home Quarantine हेतु चिन्हित व्यक्तियों के स्टैंपिंग अथवा उन्हें चिन्हित करने की व्यवस्था</td>
                            <?php 
                            if (isset($point_one_block)){
                            ?>
                            <td colspan="5"><?php if($point_one_block->nopStamped==""){echo '0';}else{ echo $point_one_block->nopStamped;} ?></td>
                            <?php
                                }else{ echo 'No Record Found....'; }
                            ?>
                        </tr>

                        <td class="text-center">4.</td>
                        <td colspan="2">Quarantine Centre पर समान्य व्यवस्थाएं यथा, पेयजल, शौचालय तथा भोजन की व्यवस्था।</td>
                        <td colspan="5">सभी व्यवस्थाएं उपलब्ध है। </td>
                        </tr>
                        <tr>
                            <td class="text-center">5.</td>
                            <td colspan="2">दो माह के राशन घर पर पहुँचाने की व्यवस्था तथा कितने प्रखंडों में यह कार्य प्रारम्भ हुआ।</td>
                            <td colspan="5">कुल कार्डधारी की संख्या- <?php if(isset($point_five)){echo $point_five->target;}else { echo '0';}?> वितरण- <?php if(isset($point_five)){echo $point_five->distributed;}else {echo '0';}?> (PMGKY)</td>
                        </tr>
                        <tr>
                            <td class="text-center">6.</td>
                            <td colspan="2">तीन माह की वृद्धा पेंशन की अग्रिम भुगतान की प्रगति।</td>
                            <td colspan="5">कुल <?php if(isset($point_six)){echo $point_six->nopSSPension;}else { echo '0';}?> लाभुकों को माह <?php if(isset($point_six)){echo date('m-Y',strtotime($point_six->month));}else { echo '0';}?> तक का पेंशन का भुगतान कर दिया गया है। शेष की भुगतान प्रक्रिया में है। </td>
                        </tr>
                        <tr>
                            <td class="text-center">7.</td>
                            <td colspan="2">जिले में हो रहे सभी श्वांस नली तथा रेस्पिरेटरी कारणों से हो रही मृत्यु की सभी घटनाओं की समीक्षा एवं आवश्यकातानुसार सैंपलिंग की व्यवस्था।</td>
                            <td colspan="5">जिले में श्वांस नली तथा रेस्पिरेटरी कारणों से अभी तक कोई भी मृत्यु नहीं हुई है। सभी अस्पतालों को निर्देष दिए गए है कि श्वांस नली तथा रेस्पिरेटरी के कारण एवं इससे संबंधित मृत्य की सूचना दी जाएं। </td>
                        </tr>
                        <tr>
                            <td class="text-center">8.</td>
                            <td colspan="2">जिले में आइसोलेशन वार्ड की स्थिति तथा वहां की सुविधाओं की सुनिश्चितता।</td>
                            <td colspan="5">
                            <?php 
                                $totalbed=0;
                                if (count($point_eight)){
                                    $sln=0;
                                    foreach ($point_eight as $peight) {
                                        $sln++;
                                        echo $peight->isoCentreName.' - ';
                                            if($peight->noBed!=""){
                                                echo $peight->noBed;;
                                                $totalbed=$totalbed+$peight->noBed;
                                            }else{
                                                echo '0';
                                            }
                                        if(count($point_eight)>$sln){
                                             echo ', ';
                                        }                                       
                                    }
                                }else { echo 'No Record Found'; }
                            ?>
                            (कुल- <?php echo $totalbed; ?>)। सभी व्यवस्थायें सुनिश्चित कर ली गई है। </td>
                        </tr>
                        <tr>
                            <td class="text-center">9.</td>
                            <td colspan="2">जिले में उपलब्ध चिकित्सकों की संपूर्ण विवरणी, जिसमें सेवानिवृत एवं निजी चिकित्सक भी सम्मिलित है।</td>
                            <td colspan="5">
                            <?php 
                                if (isset($point_nine)){
                                    echo 'सरकारी चिकित्सक - '.$point_nine->gvtdoc;
                                    echo ', सेवानिवृत चिकित्सक - '.$point_nine->retdoc;
                                    echo ' एवं निजी चिकित्सक - '.$point_nine->pvtdoc;
                                    $total=$point_nine->gvtdoc + $point_nine->retdoc + $point_nine->pvtdoc;
                                    echo ' (कुल - '.$total.')।';
                                }else { echo 'No Record Found'; }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">10.</td>
                            <td colspan="2">जिले में एन-95 मास्क, ट्रिपल लेयर मास्क, पी0पी0ई0, वी0टी0एम0 किट तथा अन्य सामग्री की उपलब्धता।</td>
                            <td colspan="5">
                            <?php 
                                if(isset($point_ten)){
                                    echo 'एन-95 मास्क - '.$point_ten->noN95MaskAvlbl;
                                    echo ', ट्रिपल लेयर मास्क - '.$point_ten->noTLMaskAvlbl;
                                    echo ', पी0पी0ई0 किट - '.$point_ten->noPPEKitAvlbl;
                                    echo ', वी0टी0एम0 किट - '.$point_ten->noVTMKitAvlbl;
                                }else{
                                    echo 'एन-95 मास्क - 0';
                                    echo ', ट्रिपल लेयर मास्क - 0';
                                    echo ', पी0पी0ई0 किट - 0';
                                    echo ', वी0टी0एम0 किट - 0';
                                }    
                            ?>
                            <?php 
                                
                                    if(isset($point_ten_inventory)){
                                        echo ', थर्मल स्कैनर - '.$point_ten_inventory->thermalScanner;
                                        echo ', गलब्स - '.$point_ten_inventory->gloves;
                                        echo ', सेनेटायजर (500 ml) - '.$point_ten_inventory->sanitizer500ml;
                                        echo ', सेनेटायजर (600 ml) - '.$point_ten_inventory->sanitizer600ml;
                                        echo ', सेनेटायजर(5L) - '.$point_ten_inventory->sanitizer5L;
                                        echo ', सेनेटायजर(15L) - '.$point_ten_inventory->sanitizer15L;
                                    }else{
                                        echo ', थर्मल स्कैनर - 0';
                                        echo ', गलब्स - 0';
                                        echo ', सेनेटायजर (500 ml) - 0';
                                        echo ', सेनेटायजर (600 ml) - 0';
                                        echo ', सेनेटायजर(5L) - 0';
                                        echo ', सेनेटायजर(15L) - 0';
                                    }
                                
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">11.</td>
                            <td colspan="2">Lock Down कि स्थिति एवं आवश्यक वस्तुओं की उपलब्धता सुनिश्चित करने हेतु जिला स्तर पर किये जा रहे उपाय।</td>
                            <td colspan="5">निजी संस्थानों के द्वारा खाद्य सामग्री, दवा, एल0पी0जी0, बेबी प्रोडेक्ट आदि की होम डिलवरी कराई जा रही है। मुख्यमंत्री दाल-भात योजना अंतर्गत <?php if(isset($point_eleven)){ echo $point_eleven->noCKOprtdByNGO ;} else { echo '0';}?> केन्द्र संचालित किये जा रहे है। </td>
                        </tr>
                        <tr>
                            <td colspan="8" align="right" class="h5 text-inverse tx-bold"><br /><br /><br /><br />उपायुक्त, धनबाद।</td>
                        </tr>
                    </table>
                </div>

                <div class="form-layout form-layout-2">
                    <div class="form-layout-footer">
                        <button class="btn btn-teal text-capitalize" onclick=printDiv();> Print Report</button>
                    </div><!-- form-group -->
                </div><!-- form-layout -->

                <!-- If Error Occurs Message Show in this Section-->
                <?php if ($error = $this->session->flashdata('error')) : ?>
                <div id="errordismiss" class="mt-2 alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                        <span><strong>Error!</strong> <?php echo $error; ?></span>
                    </div><!-- d-flex -->
                </div>
                <?php endif; ?>

                <!-- If Success then Message Show in this Section-->
                <?php if ($success = $this->session->flashdata('success')) : ?>
                <div id="successdismiss" class="mt-2 alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                        <span><strong>Success!</strong> <?php echo $success; ?></span>
                    </div><!-- d-flex -->
                </div>
                <?php endif; ?>
                </form>
            </div><!-- br-section-wrapper -->
        </div><!-- br-mainpanel -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php include_once('include/footerscript.php'); ?>
    <script>
        function printDiv() {
            var divtoPrint = document.getElementById('mainDivToPrint');
            var popupwindow = window.open('', '_blank', 'width=800,height=400,location=no,left=50px');
            popupwindow.document.open();
            popupwindow.document.write('<html>');
            popupwindow.document.write('<head>');
            popupwindow.document.write('<link href="/eprativedan/assets/css/bracket.css" rel="stylesheet" type="text/css"/>');
            popupwindow.document.write('<style type="text/css"> table th, table td {border:1px solid #000;padding:0.5em;border-collapse: collapse;}</style>');
            //popupwindow.document.write('');
            popupwindow.document.write('</head>');
            popupwindow.document.write('<body onload="window.print()">' + divtoPrint.innerHTML + '</body></html>');
            popupwindow.document.close();
        }
    </script>
</body>

</html>