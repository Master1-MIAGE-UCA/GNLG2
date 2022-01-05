<style>
    .current a {
  color:#3f51b5;
}

.tab-content {
  display:none;
}

#tab-1 {
  display:block;
}
    </style>
<div class="card">
        <div class="card-content">

            <!-- Begin:tab -->
            <div class="row">
                <div class="col s12 card-panel">
                    <ul class="tabs-menu">
                        <li class="tab col sm current"><a href="#tab_1" >Acte de naissance</a></li>
                        <li class="tab col sm "><a href="#tab_2" >Epoux</a></li>
                        <li class="tab col sm "><a href="#tab_3" >Epouse</a></li>
                        <li class="tab col sm "><a href="#tab_4" >Témoins</a></li>
                        <li class="tab col sm "><a href="#tab_5" >Références</a></li>
                        <li class="tab col sm "><a href="#tab_6" >Crédits</a></li>

                    </ul>
                </div>
                <div id="tab_1" class="col s12 tab-content ">

                <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Code INSEE:</td>
                                    <td class="users-view-username">{{$bornAct->IDNIM}}</td>
                                </tr>
                                <tr>
                                    <td>Commune:</td>
                                    <td class="users-view-name">{{$bornAct->COMMUNE}}</td>
                                </tr>
                                <tr>
                                    <td>Code département:</td>
                                    <td class="users-view-email">{{$bornAct->CODDEP}}</td>
                                </tr>

                                <tr>
                                    <td>Département:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->DEPART}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Date de l'acte:</td>
                                    <td><span><b
                                    class="users-view-username">{{$bornAct->DTDEPOT}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Date républicaine:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->DTMODIF}}</b></span></td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
                <div id="tab_2" class="col s12 tab-content ">
                <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Nom de l'époux :</td>
                                    <td class="users-view-username">{{$bornAct->NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$bornAct->PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Origine :</td>
                                    <td class="users-view-email">{{$bornAct->COMMUNE}}</td>
                                </tr>

                                <tr>
                                    <td>Né le:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->LADATE}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Agé de:</td>
                                    <td><span><b
                                    class="users-view-username">{{$bornAct->TYPACT}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->DTMODIF}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Veuf de:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->DTMODIF}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->COM}}</b></span></td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                    <h6 class="mb-2 mt-2"><i class="material-icons">account_circle</i> Ses parents</h6>

                    <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Nom du père:</td>
                                    <td class="users-view-username">{{$bornAct->P_NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$bornAct->P_PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire :</td>
                                    <td class="users-view-email">{{$bornAct->P_COM}}</td>
                                </tr>

                                <tr>
                                    <td>Profession:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->P_PRO}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nom de la mère:</td>
                                    <td><span><b
                                    class="users-view-username">{{$bornAct->M_NOM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->M_PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->M_COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->M_PRO}}</b></span></td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>

                <div id="tab_3" class="col s12 tab-content ">



                <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Nom de l'épouse :</td>
                                    <td class="users-view-username">{{$bornAct->NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$bornAct->PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Origine :</td>
                                    <td class="users-view-email">{{$bornAct->BIDON}}</td>
                                </tr>

                                <tr>
                                    <td>Née le:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->LADATE}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Agée de:</td>
                                    <td><span><b
                                    class="users-view-username">{{$bornAct->TYPACT}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->M_PRO}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Veuve de:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->DTMODIF}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->COM}}</b></span></td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                    <h6 class="mb-2 mt-2"><i class="material-icons">account_circle</i> Ses parents</h6>

                    <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Nom du père:</td>
                                    <td class="users-view-username">{{$bornAct->P_NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$bornAct->P_PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire :</td>
                                    <td class="users-view-email">{{$bornAct->P_COM}}</td>
                                </tr>

                                <tr>
                                    <td>Profession:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->P_PRO}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nom de la mère:</td>
                                    <td><span><b
                                    class="users-view-username">{{$bornAct->M_NOM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->M_PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->M_COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->M_PRO}}</b></span></td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div id="tab_4" class="col s12 tab-content ">

                <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Témoin 1 :</td>
                                    <td class="users-view-username">{{$bornAct->T1_NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom :</td>
                                    <td class="users-view-name">{{$bornAct->T1_PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td class="users-view-email">{{$bornAct->T1_COM}}</td>
                                </tr>

                                <tr>
                                    <td>Témoin 2:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->T2_NOM}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Prénom :</td>
                                    <td><span><b
                                    class="users-view-username">{{$bornAct->T2_PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$bornAct->T2_COM}}</b></span></td>
                                </tr>
                               <!-- Les témoins 3 et 4 ne sont pas définis dans la BD c'est pour je l'ai enlevé-->
                                </tbody>
                            </table>


                        </div>
                    </div>


                </div>
                <div id="tab_5" class="col s12 tab-content ">


                <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Cote :</td>
                                    <td class="users-view-username">{{$bornAct->COTE}}</td>
                                </tr>
                                <tr>
                                    <td>Libre :</td>
                                    <td class="users-view-name">{{$bornAct->LIBRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire général:</td>
                                    <td class="users-view-email">{{$bornAct->COMGEN}}</td>
                                </tr>

                                <tr>
                                    <td>Photos:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->PHOTOS}}</b></span>
                                    </td>
                                </tr>


                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div id="tab_6" class="col s12 tab-content ">

                <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Déposant :</td>
                                    <td class="users-view-username">{{$bornAct->DEPOSANT}}</td>
                                </tr>
                                <tr>
                                    <td>Photographe:</td>
                                    <td class="users-view-name">{{$bornAct->PHOTOGRA}}</td>
                                </tr>
                                <tr>
                                    <td>Transcripteur:</td>
                                    <td class="users-view-email">{{$bornAct->RELEVEUR}}</td>
                                </tr>

                                <tr>
                                    <td>Vérificateur:</td>
                                    <td><span class="users-view-username" ><b>{{$bornAct->VERIFIEU}}</b></span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>



            </div>
            <!-- End:tab -->

        </div>
    </div>
    <script>
        $(document).ready(function(){

$('.tabs-menu a').click(function(event) {
  event.preventDefault();

  // Toggle active class on tab buttons
  $(this).parent().addClass("current");
  $(this).parent().siblings().removeClass("current");

  // display only active tab content
  var activeTab = $(this).attr("href");
  $('.tab-content').not(activeTab).css("display","none");
  $(activeTab).fadeIn();

});

});
        </script>
