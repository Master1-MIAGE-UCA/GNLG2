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
                        <li class="tab col sm current"><a href="#tab_1" >Acte divers</a></li>
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
                                    <td class="users-view-username">{{$diversAct->IDNIM}}</td>
                                </tr>
                                <tr>
                                    <td>Commune:</td>
                                    <td class="users-view-name">{{$diversAct->COMMUNE}}</td>
                                </tr>
                                <tr>
                                    <td>Code département:</td>
                                    <td class="users-view-email">{{$diversAct->CODDEP}}</td>
                                </tr>

                                <tr>
                                    <td>Département:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->DEPART}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Date de l'acte:</td>
                                    <td><span><b
                                    class="users-view-username">{{$diversAct->DTDEPOT}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Date républicaine:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->DTMODIF}}</b></span></td>
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
                                    <td class="users-view-username">{{$diversAct->NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$diversAct->PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Origine :</td>
                                    <td class="users-view-email">{{$diversAct->COMMUNE}}</td>
                                </tr>

                                <tr>
                                    <td>Né le:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->LADATE}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Agé de:</td>
                                    <td><span><b
                                    class="users-view-username">{{$diversAct->TYPACT}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->DTMODIF}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Veuf de:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->DTMODIF}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->COM}}</b></span></td>
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
                                    <td class="users-view-username">{{$diversAct->P_NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$diversAct->P_PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire :</td>
                                    <td class="users-view-email">{{$diversAct->P_COM}}</td>
                                </tr>

                                <tr>
                                    <td>Profession:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->P_PRO}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nom de la mère:</td>
                                    <td><span><b
                                    class="users-view-username">{{$diversAct->M_NOM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->M_PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->M_COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->M_PRO}}</b></span></td>
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
                                    <td class="users-view-username">{{$diversAct->NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$diversAct->PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Origine :</td>
                                    <td class="users-view-email">{{$diversAct->BIDON}}</td>
                                </tr>

                                <tr>
                                    <td>Née le:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->LADATE}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Agée de:</td>
                                    <td><span><b
                                    class="users-view-username">{{$diversAct->TYPACT}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->M_PRO}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Veuve de:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->DTMODIF}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->COM}}</b></span></td>
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
                                    <td class="users-view-username">{{$diversAct->P_NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$diversAct->P_PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire :</td>
                                    <td class="users-view-email">{{$diversAct->P_COM}}</td>
                                </tr>

                                <tr>
                                    <td>Profession:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->P_PRO}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nom de la mère:</td>
                                    <td><span><b
                                    class="users-view-username">{{$diversAct->M_NOM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->M_PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->M_COM}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Profession:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->M_PRO}}</b></span></td>
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
                                    <td class="users-view-username">{{$diversAct->T1_NOM}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom :</td>
                                    <td class="users-view-name">{{$diversAct->T1_PRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td class="users-view-email">{{$diversAct->T1_COM}}</td>
                                </tr>

                                <tr>
                                    <td>Témoin 2:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->T2_NOM}}</b></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Prénom :</td>
                                    <td><span><b
                                    class="users-view-username">{{$diversAct->T2_PRE}}</b></span></td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td><span ><b
                                    class="users-view-username">{{$diversAct->T2_COM}}</b></span></td>
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
                                    <td class="users-view-username">{{$diversAct->COTE}}</td>
                                </tr>
                                <tr>
                                    <td>Libre :</td>
                                    <td class="users-view-name">{{$diversAct->LIBRE}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire général:</td>
                                    <td class="users-view-email">{{$diversAct->COMGEN}}</td>
                                </tr>

                                <tr>
                                    <td>Photos:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->PHOTOS}}</b></span>
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
                                    <td class="users-view-username">{{$diversAct->DEPOSANT}}</td>
                                </tr>
                                <tr>
                                    <td>Photographe:</td>
                                    <td class="users-view-name">{{$diversAct->PHOTOGRA}}</td>
                                </tr>
                                <tr>
                                    <td>Transcripteur:</td>
                                    <td class="users-view-email">{{$diversAct->RELEVEUR}}</td>
                                </tr>

                                <tr>
                                    <td>Vérificateur:</td>
                                    <td><span class="users-view-username" ><b>{{$diversAct->VERIFIEU}}</b></span>
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
