@extends('Admin.views.navtemplate')
@section('contenu')
<style>
    @media (width: 1024px) {
        #Divglobale {
            margin-right: 50px;
            /* Hide the sidebar by default on smaller screens */
        }
    }

    @media (min-width: 1025px) and (max-width:1444 px) {
        #Divglobale {
            margin-left: 0px;
            /* Hide the sidebar by default on smaller screens */
        }
    }

    @media (min-width: 768px) {
        #Divglobale {
            margin-left: 214px;
            /* Set max-width to match iPad Air width */
        }
    }
    @media (width: 2560px) {
       table {
           width: 2204px;
            /* Set max-width to match iPad Air width */
        }
    }
    .fixed {
        margin-top: 20PX;
    }

    .fixed2 {
        margin-top: 20PX;

    }
   
</style>



<div class="container mt-5 " id="Divglobale">
    <div class="row">


        <div class="col-md-10 mt-5 ">
            <form action="">
                <fieldset class="border p-2 fixed">
                    <legend class="w-auto">filtrer par :</legend>
                    <label for=""> Année:</label>&nbsp;&nbsp;
                    <select name="" id="" class="w-4 form-control ng-pristine ng-valid ng-touched"
                        id="field_anneeUniversitaireId">
                        <option value="0: undefined" selected></option>
                        <option value="">2020-2021</option>
                        <option value="">2021-2022</option>
                        <option value="">2022-2023</option>
                        <option value="">2023-2024</option>
                    </select>
                    <div>
                        <button class="btn btn-sm btn-inverse border" style="background-color:#3966c2;color:white;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16" style="margin-right: 5px;">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.1l3.85 3.85a1 1 0 0 0 1.4-1.414l-3.85-3.85a1 1 0 0 0-.1-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                            Recherche
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    
    <!--  <div class=" container-fluid mr-2 pl-2 fixed2">
        <div class="  row">
       
        <div  class="col-md-9 mt-5  ">
            <table class="table table-striped table-bordered data-table table-th-valign-middle table-td-valign-middle m-0 p-0" style="width:100%;  color:white ; background-color: #3966c2">
           
            <tr>
            <th colspan="3">
         <span>Version étape</span>
    </th>
    <th colspan="3">
         <span>Semestre</span>
    </th>
    <th colspan="4">
         <span>Module</span>
    </th>
         
    <th colspan="3">
         <span>Elements</span>
    </th>
    <th colspan="2" rowspan="2" >
         <span class="">Epreuve</span>
    </th>
    <th colspan="1" rowspan="2">
         <span>Etat</span>
    </th>
    <tr>
        <th>semestre</th>
        <th>note</th>
        <th>res</th>
        <th>semestre</th>
        <th>note</th>
        <th>res</th>
        <th>Nom </th>
        <th>note</th>
        <th>res</th>
        <th>pj</th>
        <th>Nom </th>
        <th>note</th>
        <th>res</th>
    </tr> </thead>
    <tbody style=" background-color: #ccc;">
    <tr >
        <td rowspan="34"></td>
        <td  rowspan="34"></td>
        <td  rowspan="34"></td>
        <td  rowspan="16"></td>
        <td  rowspan="16"></td>
        <td  rowspan="16"></td>
        <td  rowspan="4"> module1</td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
        <td  rowspan="2"></td>
        <td  rowspan="2"></td></tr>
        <tr></tr>
        <tr>
    <td></td>
            
          <td></td>
        <td></td>
        
    </tr>
    <tr></tr>

    <tr><td  rowspan="4"> module2</td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
        <td  rowspan="2"></td>
        <td  rowspan="2"></td></tr>
        <tr></tr><tr></tr><tr><td></td><td></td><td></td></tr>
    <tr></tr>

    <tr><td  rowspan="4"> module3 kkh nggu jgfyi gjcgj </td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
        <td  rowspan="2"></td>
        <td  rowspan="2"></td></tr>
        <tr></tr>
        <tr><td></td><td></td><td></td></tr>
    <tr></tr>

    <tr><td  rowspan="4"> module4</td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
        <td  rowspan="2"></td>
        <td  rowspan="2"></td></tr>
        <tr></tr>
     <tr><td></td><td></td><td></td></tr>

     
    <tr><tr></tr></tr><tr></tr>
     <tr></tr><tr>
        <td  rowspan="4"> module4</td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="4"></td>
        <td  rowspan="4" ></td>
        <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
        <td  rowspan="2"></td>
        <td  rowspan="2"></td></tr>
        <tr></tr>

    </tbody>


            </table>
        </div></div>-->
    <table class="table table-striped table-bordered data-table table-th-valign-middle table-td-valign-middle fixed2" style=" ">
        <thead style="background-color: #39548a;color:white;">
            <tr>
                <th colspan="3">
                    <span>
                        <span title="">Version etape</span>
                    </span>
                </th>
                <th colspan="3"><span>
                        <span>Semestre</span><!----></span>
                </th>
                <th colspan="4"><span>

                        <span title="">Module</span><!----></span><!----></th>
                <th colspan="3"><span adctranslate="">
                        <span title="">Elément module</span><!----></span></th>
                <th rowspan="2" colspan="2"><span adctranslate="etudiant.epreuve">
                        <span title="etudiant.epreuve.tooltip">Epreuve</span><!----></span></th>
                <th rowspan="2" colspan="2">
                </th>
            </tr>
            <tr>
                <th></th>
                <th rowspan="">
                    <span adctranslate="etudiant.note"><span title="etudiant.note.tooltip">Note</span><!----></span>
                </th>
                <th rowspan=""><span adctranslate="fstsApp.etudiant.res">
                        <span title=".etudiant.res.tooltip">Res</span><!----></span></th>
                <th>
                </th>
                <th rowspan=""><span adctranslate=".etudiant.note">
                        <span title=".etudiant.note.tooltip">Note</span><!----></span></th>
                <th rowspan="">
                    <span adctranslate="App.etudiant.res">
                        <span title="App.etudiant.res.tooltip">Res</span><!----></span>
                </th>
                <th></th>
                <th rowspan="">
                    <span adctranslate="App.etudiant.note">
                        <span title="App.etudiant.note.tooltip">Note</span><!----></span>
                </th>
                <th rowspan="">
                    <span adctranslate="App.etudiant.res">
                        <span title="App.etudiant.res.tooltip">Res</span><!----></span>
                </th>
                <th rowspan="">
                    <span adctranslate="App.etudiant.pj"><span title="App.etudiant.pj.tooltip">Pj</span>
                        <!----></span>
                </th>
                <th></th>
                <th rowspan=""><span adctranslate="App.etudiant.note"><span
                            title="App.etudiant.note.tooltip">Note</span><!---->
                    </span></th>
                <th rowspan=""><span adctranslate="App.etudiant.res"><span
                            title="App.etudiant.res.tooltip">Res</span><!---->

                    </span></th>
            </tr>
        </thead>


        <tbody>
            <tr class="tr-td-middle">
                <td rowspan="34"> S5_S6 LST SITD </td><!---->
                <td rowspan="34"> </td><!---->
                <td rowspan="34"><!----> </td><!---->
                <td rowspan="16"> S6 LST SITD </td><!---->
                <td rowspan="16"> <!----><!----></td><!---->
                <td rowspan="16"> </td><!---->
                <td rowspan="1">  <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td rowspan="1"> <!----></td><!---->
                <td rowspan="1"> </td><!---->
                <td rowspan="1"> <!----></td><!---->
                <td rowspan="1">  </td><!---->
                <td rowspan="1"> </td><!---->
                <td rowspan="1"> </td><!---->
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT </td><!---->
                <td nowrap="" rowspan="1"> <!----><!----><!----><!----></td><!----><!----><!---->
                <td><ng-component _nghost-pcv-c120=""><!----></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a><!----><!----><!----><!----></td>
            </tr><!---->
            <tr class="tr-td-middle"><!----><!----><!----><!----><!----><!---->
                <td rowspan="6"> 
                    <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td rowspan="6"><!----></td><!---->
                <td rowspan="6">  </td><!---->
                <td rowspan="6">  <!----></td><!---->
                <td rowspan="3">  </td><!---->
                <td rowspan="3"> </td><!---->
                <td rowspan="3">  </td><!---->
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC </td><!---->
                <td nowrap="" rowspan="1">  <!----><!----><!----><!----></td><!----><!----><!---->
                <td><ng-component _nghost-pcv-c120=""><!----></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a><!----><!----><!----><!----></td>
            </tr><!---->
            <tr class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT </td><!---->
                <td nowrap="" rowspan="1">  <!----><!----><!----><!----></td><!----><!----><!---->
                <td><ng-component _nghost-pcv-c120=""><!----></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a><!----><!----><!----><!----></td>
            </tr><!---->
            <tr class="tr-td-middle">
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP </td>
                <td nowrap="" rowspan="1">  </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td rowspan="3">  </td>
                <td rowspan="3">  </td>
                <td rowspan="3"> </td>
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td rowspan="6">  </td>
                <td rowspan="6"> </td>
                <td rowspan="6"> </td>
                <td rowspan="6"> </td>
                <td rowspan="3"> </td>
                <td rowspan="3"> </td>
                <td rowspan="3"> </td>
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td rowspan="3"> </td>
                <td rowspan="3"> </td>
                <td rowspan="3"> </td>
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC </td>
                <td nowrap="" rowspan="1"> </td>
                <td><ng-component _nghost-pcv-c120=""></ng-component><a replaceurl="true" placement="top"
                        ngbtooltip="Ajouter reclamation" class="text-danger"><i
                            class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr class="tr-td-middle">
                <td style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP </td>
                <td nowrap="" rowspan="1"> </td>
                <td ><ng-component _nghost-pcv-c120=""></ng-component><a 
                        replaceurl="true" placement="top" ngbtooltip="Ajouter reclamation" class="text-danger"><i
                             class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr  class="tr-td-middle">
                <td  rowspan="3"> </td>
                <td  rowspan="3"> </td>
                <td  rowspan="3"> </td>
                <td  rowspan="3"> </td>
                <td  rowspan="3">  </td>
                <td  rowspan="3"> </td>
                <td  rowspan="3"> </td>
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC
                </td>
                <td  nowrap="" rowspan="1"> </td>
                <td ><ng-component _nghost-pcv-c120=""></ng-component><a 
                        replaceurl="true" placement="top" ngbtooltip="Ajouter reclamation" class="text-danger"><i
                             class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr  class="tr-td-middle">
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT
                </td>
                <td  nowrap="" rowspan="1"> </td>
                <td ><ng-component _nghost-pcv-c120=""></ng-component><a 
                        replaceurl="true" placement="top" ngbtooltip="Ajouter reclamation" class="text-danger"><i
                             class="fas fa-exclamation-circle"></i></a></td>
            </tr>
            <tr  class="tr-td-middle">
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP
                </td>
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><ng-component _nghost-pcv-c120=""><!----></ng-component><a
                         replaceurl="true" placement="top" ngbtooltip="Ajouter reclamation"
                        class="text-danger"><i 
                            class="fas fa-exclamation-circle"></i></a><!----><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle"><!----><!----><!---->
                <td  rowspan="18"> S5 LST SITD </td><!---->
                <td  rowspan="18">  <!----><!----></td><!---->
                <td  rowspan="18"></td><!---->
                <td  rowspan="3">
                    <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td  rowspan="3"> <!----></td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3"> </td><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP
                </td><!---->
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle"><!----><!----><!----><!----><!----><!---->
                <td  rowspan="3"> 
                    <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3">  </td><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td >><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP
                </td><!---->
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle"><!----><!----><!----><!----><!----><!---->
                <td  rowspan="3">
                    <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td  rowspan="3"> <!----></td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3"><!----></td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3"> </td><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle"><!----><!----><!----><!----><!----><!---->
                <td  rowspan="3"> 
                    <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3"> </td><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC
                </td><!---->
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP
                </td><!---->
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle"><!----><!----><!----><!----><!----><!---->
                <td  rowspan="3"> 
                    <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3"> </td><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP
                </td><!---->
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle"><!----><!----><!----><!----><!----><!---->
                <td  rowspan="3">
                    <!----><!----><!----><!----><!----><!----><!----><!----></td><!---->
                <td  rowspan="3"> <!----></td><!---->
                <td  rowspan="3"> </td><!---->
                <td  rowspan="3">  <!----></td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3">  </td><!---->
                <td  rowspan="3"> </td><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CC
                </td><!---->
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> TP
                </td><!---->
                <td  nowrap="" rowspan="1"> <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!---->
            <tr  class="tr-td-middle">
                <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                <td  style="background-color: #f1e6d7; font-weight: 400;" rowspan="1"> CT
                </td><!---->
                <td  nowrap="" rowspan="1">  <!----><!----><!----><!----></td>
                <!----><!----><!---->
                <td ><!----><!----><!----></td>
            </tr><!----><!---->
        </tbody>{{--  --}}
    </table>
@endsection