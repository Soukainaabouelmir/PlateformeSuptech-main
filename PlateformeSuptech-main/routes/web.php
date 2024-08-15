<?php
use App\Http\Controllers\NoteEtudiantController;
use App\Http\Controllers\Absenceetudiant;
use App\Http\Controllers\AbsenceProfacceuilcontroller;
use App\Http\Controllers\AjouteNoteController;
use App\Http\Controllers\Auth\AccueilLoginController;
use App\Http\Controllers\Auth\EtudiantLoginController;
use App\Http\Controllers\Auth\ProfLoginController;
use App\Http\Controllers\Auth\RHLoginController;
use App\Http\Controllers\Auth\ScolariteLoginController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\CahierTextProfController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashbordRHController;
use App\Http\Controllers\DemandeetudiantController;
use App\Http\Controllers\DemandeScolariteController;
use App\Http\Controllers\EmploiaccueilController;
use App\Http\Controllers\EmploiscolariteController;
use App\Http\Controllers\ExamNotificationController;
use App\Http\Controllers\FormtelechargerController;
use App\Http\Controllers\GestioncompteController;
use App\Http\Controllers\HistoriqueprofController;
use App\Http\Controllers\HomeaAccuielController;
use App\Http\Controllers\homeadminController;
use App\Http\Controllers\homeetudiantController;
use App\Http\Controllers\homelogincontroller;
use App\Http\Controllers\homeProfController;
use App\Http\Controllers\homeRHController;
use App\Http\Controllers\homeScolariteController;
use App\Http\Controllers\ListePresenceController;
use App\Http\Controllers\ListetudiantController;
use App\Http\Controllers\LoginetudiantController;
use App\Http\Controllers\loginrhcontroller;
use App\Http\Controllers\NoteProfController;
use App\Http\Controllers\PaiementetudiantController;
use App\Http\Controllers\PaiementScolariteController;
use App\Http\Controllers\PresenceProfController;
use App\Http\Controllers\Profil_etudiantController;
use App\Http\Controllers\ProgrammeEvaluationController;
use App\Http\Controllers\ReclamationScolariteController;
use App\Http\Controllers\RhPersonnelControlleur;
use App\Http\Controllers\DemandeScolaritearchiveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\calendarcontroller;
Route::get('/', function () {

    return view('homelogin');
});

Route::get('/absence/etudiant', [Absenceetudiant::class, 'index'])->name('absence');
Route::get('/emploi/accueil', [EmploiaccueilController::class, 'index'])->name('emploiaccueil');
Route::get('/navtemplate', [GestioncompteController::class, 'indexx']);
Route::get('/cc', [GestioncompteController::class, 'indexxx']);

Route::get('/groupes/{id}', 'EmploiscolariteController@getGroupesByFiliere')->name('groupes.by.filiere');

//========================================Role Admin===========================================================
Route::middleware(['is_admin'])->group(function () {
    Route::get('/homeadmin', [homeadminController::class, 'index'])->name('homeadmin');
    Route::get('/dashboard-data', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/gestioncomptes', [GestioncompteController::class, 'index'])->name('gestioncomptes');
    Route::post('/creationcomptes', [GestioncompteController::class, 'store'])->name('creationcomptes');
    // ce que j'ai ajouté pour filtre des etudiants 
    Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.views.index');
    Route::get('/admin/students/filter', [StudentController::class, 'filter'])->name('admin.students.filter');
});
// ce que j'ai ajouté pour filtre des profs
    Route::get('/profs', [ProfController::class, 'index'])->name('profs.views.index');
    Route::get('/profs/data', [ProfController::class, 'data'])->name('profs.data');



//===========================================Role RH=============================================================
Route::middleware(['is_rh'])->group(function () {
    Route::get('/dashboardRH', [DashbordRHController::class, 'index'])->name('dashboardrh');
    Route::get('/homeRH', [homeRHController::class, 'index'])->name('homeRH');
    Route::post('/ajouter-Personnel', [RhPersonnelControlleur::class, 'store'])->name('ajouter-Personnel');
    Route::get('/getDatapersonnel', [RhPersonnelControlleur::class, 'fetchPersonnel'])->name('getDatapersonnel');
    Route::post('/delete-Personnel', [RhPersonnelControlleur::class, 'deletePersonne'])->name('delete-Personnel');
    Route::post('/update-Personnel', [RhPersonnelControlleur::class, 'updatePersonne'])->name('update-Personnel');
    Route::get('fetch-Personnel', [RhPersonnelControlleur::class, 'fetchPersonnel'])->name('getDataPersonnel');
    Route::get('/Personnel', [RhPersonnelControlleur::class, 'index'])->name('listPersonnel');
    Route::delete('/personnel/{id_personnel}', [RhPersonnelControlleur::class, 'destroy'])->name('personnel.destroy');
});

//===========================================Role Scolarité=======================================================
Route::middleware(['is_scolarite'])->group(function () {
    Route::get('/homescolarite', [homeScolariteController::class, 'index'])->name('homescolarite');
    Route::get('/scolaritelisteetudient', [ListetudiantController::class, 'index'])->name('listetudiant');
    Route::get('/paiementscolarite/search', [PaiementScolariteController::class, 'search'])->name('paiementscolarite.search');
    Route::get('/paiementscolarite', [PaiementScolariteController::class, 'index'])->name('paiementscolarite');
    Route::get('/exams/create', [ExamNotificationController::class, 'create'])->name('scolarite.views.notificationsexam');
    Route::get('/demandescolarite', [DemandeScolariteController::class, 'index'])->name('demandescolarite');
    Route::get('/demandesfetch', [DemandeScolariteController::class, 'fetchDemandes'])->name('demandes.data');
    Route::post('/demandes/{apogee}/valider', [DemandeScolariteController::class, 'valider'])->name('demandes.valider');
    Route::post('/demandes/archiver/{apogee}', [DemandeScolariteController::class, 'archiver'])->name('demandes.archiver');
    Route::get('/demandescolarite/search', [DemandeScolariteController::class, 'search'])->name('demandescolarite.search');
    Route::get('/demandescolarite/archivedata', [DemandeScolaritearchiveController::class, 'demandeEtudiants'])->name('demandes.etudiants');
    Route::get('/demandescolarite/archive', [DemandeScolaritearchiveController::class, 'index'])->name('demandescolarite.archive');
    Route::get('demadnescolariteetudiants', [DemandeScolariteController::class, 'demandeEtudiants'])->name('getDataDemande');
    Route::get('/reclamationscolarite/search', [ReclamationScolariteController::class, 'search'])->name('reclamationscolarite.search');
    Route::get('/reclamationscolarite', [ReclamationScolariteController::class, 'index'])->name('reclamationscolarite');
    Route::get('/emploi/create', [EmploiscolariteController::class, 'create'])->name('scolarite.views.emploi');
    Route::post('/emploi', [EmploiscolariteController::class, 'store'])->name('emploi.store');
    Route::post('/demande/{id}', [DemandeScolariteController::class, 'destroy'])->name('demandes.destroy');
    Route::get('demadnescolariteetudiants', [DemandeScolariteController::class, 'demandeEtudiants'])->name('getDataDemande');
    Route::get('/calendar', [calendarcontroller::class, 'index'])->name('calendar');
    Route::put('/etudiants/{id}', [ListetudiantController::class, 'update'])->name('etudiants.update');
    Route::get('/save-calendar', [calendarcontroller::class, 'getEvents'])->name('getEvent');
    Route::post('/save-calendar', [calendarcontroller::class, 'saveEvent'])->name('storeEvent');
    Route::delete('/etudiants/{id}', [ListetudiantController::class, 'destroy'])->name('etudiants.destroy');
    Route::get('/etudiants/export', [ListetudiantController::class, 'export'])->name('etudiants.export');
    Route::get('/etudiant/data', [ListetudiantController::class, 'fetchEtudiantss'])->name('etudiants.data');
    Route::get('/demandes/download/{apogee}', [DemandeScolariteController::class, 'download'])->name('demandes.download');
    Route::post('/demandes/rejeter/{apogee}', [DemandeScolariteController::class, 'rejeter'])->name('demandes.rejeter');
    Route::post('/paiement/{apogee}/valider', [PaiementScolariteController::class, 'valider'])->name('paiement.valider');
    Route::post('/paiement/rejeter/{apogee}', [PaiementScolariteController::class, 'rejeter'])->name('paiement.rejeter');

   



});

Route::middleware(['is_accueil'])->group(function () {
    Route::get('/homeacceuil', [HomeaAccuielController::class, 'index'])->name('homeacceuil');
    Route::get('/absenceaccuiel', [AbsenceProfacceuilcontroller::class, 'index'])->name('absence.accueil');
    Route::get('/absence/create', [AbsenceProfacceuilcontroller::class, 'create'])->name('absenceacceuil');
    Route::post('/absence/accueil', [AbsenceProfacceuilcontroller::class, 'store'])->name('absence.store');
    Route::get('/personnel/data', [AbsenceProfacceuilcontroller::class, 'data'])->name('accueil.data');
});
Route::get('/logoutaccueil', [AccueilLoginController::class, 'logout'])->name('logout.accueil');
//**************************************PROF LOGIN */
Route::group(['middleware' => ['is_prof']], function () {
    Route::get('/loginprof', [ProfLoginController::class, 'index'])->name('login.prof');
    Route::post('/loginprof2', [ProfLoginController::class, 'login_prof'])->name('login.prof.submit');
    Route::get('/homeprof', [homeProfController::class, 'index'])->name('homeprof');

});
Route::get('/logoutprof', [ProfLoginController::class, 'logout'])->name('logout.prof');
//µµµµµ***************************RHLOGIN//

/***********************************************/
Route::get('/homelogin', [homelogincontroller::class, 'index'])->name('home.login');
Route::get('/login/rh', [RHLoginController::class, 'index'])->name('login.RH');

Route::get('/loginRH', [loginrhcontroller::class, 'index'])->name('login.rh');


Route::post('/exams', [ExamNotificationController::class, 'store'])->name('exams.store');
Route::get('/student/exams', [ExamNotificationController::class, 'studentExams'])->name('etudiant.views.exametudiant');

// Emploi etudiant

Route::get('/etudiant/emplois', [EmploiscolariteController::class, 'studentEmploi'])->name('etudiant.emplois');

Route::middleware(['web'])->group(function () {
    Route::get('/loginetudiant', [EtudiantLoginController::class, 'index'])->name('etudient.login');
    Route::post('/loginetudiant2', [EtudiantLoginController::class, 'login_etudient'])->name('login.submit');
    Route::get('/homeetudiant', [homeetudiantController::class, 'index'])->name('homeetudiant');
    Route::get('/paiements/{apogee}/{type_frais}', [PaiementetudiantController::class, 'getPaiements']);
});

Route::get('/logout', [EtudiantLoginController::class, 'logout'])->name('logout.etudiant');


Route::get('/etudiant/demandes/data', [DemandeetudiantController::class, 'demandeEtudiants'])->name('demandeEtudiants');

route::get('/emploi', 'App\Http\Controllers\EmploietudiantController@index')->name('emploi');
route::get('/demande', 'App\Http\Controllers\DemandeetudiantController@index')->name('demande');
route::get('/demandenotification', 'App\Http\Controllers\DemandeetudiantController@espace')->name('demandenotification');
route::post('/enregistrer-demande', 'App\Http\Controllers\DemandeetudiantController@store')->name('endemande');
route::get('/reclamation', 'App\Http\Controllers\ReclamationetudiantController@index')->name('reclamation');
Route::post('/enregistrer-reclamation', 'App\Http\Controllers\ReclamationetudiantController@enregistrerReclamation')->name('enreclamation');
Route::post('/enregistrer-paiement', 'App\Http\Controllers\PaiementetudiantController@store')->name('enpaiement');

route::get('/paiement', 'App\Http\Controllers\PaiementetudiantController@index')->name('paiement');
route::get('/note', 'App\Http\Controllers\NoteEtudiantController@index')->name('note');

Route::get('/nav', function () {
    return view('prof.layouts.navbarprof');

});
Route::get('/etudiants', [LoginetudiantController::class, 'index']);
Route::get('/etudiants/search', [LoginetudiantController::class, 'search'])->name('etudiant.search');

Route::get('/navbarsscolarite', function () {
    return view('scolarite.layouts.navbarscolarite');

});


Route::get('/etudiants/search/scolarite', [ListetudiantController::class, 'search'])->name('etudiant.search.scolarite');




Route::get('/Profil_etudiant', [Profil_etudiantController::class, 'index'])->name('Profil_etudiant');
Route::post('/upload-image', [Profil_etudiantController::class, 'uploadImage'])->name('upload.image');

Route::get('/programme-evaluation/create', [ProgrammeEvaluationController::class, 'create'])->name('programme_evaluation.create');
Route::post('/programme-evaluation/store', [ProgrammeEvaluationController::class, 'store'])->name('programme_evaluation.store');

Route::get('/cahiertextprof', [CahierTextProfController::class, 'index'])->name('cahiertextprof');
Route::get('/Presence', [PresenceProfController::class, 'index'])->name('PresenceEtudiant');
//Route::post('/telecharger-fichier', [FormtelechargerController::class, 'telechargerFichier'])->name('telecharger.fichier');

//Route::post('/enregistrercahiertext', 'App\Http\Controllers\FormtelechargerController@enregistrercahiertext')->name('enregistrercahiertext');

Route::post('/enregistrer-cahier-de-texte', [FormtelechargerController::class, 'enregistrerCahierDeTexte'])->name('enregistrer.cahier');

// Route pour télécharger le cahier de texte
Route::post('/telecharger-cahier-de-texte', [FormtelechargerController::class, 'telechargerCahierDeTexte'])->name('telecharger.cahier');

Route::get('/search', [ListePresenceController::class, 'search'])->name('listepresence.search');

Route::post('/enregistrer-exam', [NotifactionsexamController::class, 'enregistrerPaiement'])->name('enregnotificationsexam');
Route::get('/Note_etudiants', [NoteProfController::class, 'index'])->name('noteetudiants');

Route::get('/Note_etudiants', [NoteProfController::class, 'index'])->name('noteetudiants');
Route::get('/Note_etudiants_Ajoute', [AjouteNoteController::class, 'indexx'])->name('Ajouternoteetudiants');

Route::post('/ajouter-etudiant', [ListetudiantController::class, 'store'])->name('etudiants.store');
Route::get('/getDataprofs', [AbsenceProfacceuilcontroller::class, 'fetchPersonnel'])->name('getDataprofs');
Route::get('fetchetudiants', [ListetudiantController::class, 'fetchEtudiants'])->name('getDataEtudients');
Route::post('/update-notes', [AjouteNoteController::class, 'updateNotes'])->name('update.notes');
Route::get('fetch-etudiants', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiants');

Route::get('/historiqueprofesseur/search', [HistoriqueprofController::class, 'fetchHistorique'])->name('hisroriqueprofesseur');
Route::get('/historiqueprof', [HistoriqueprofController::class, 'index'])->name('historiqueprof');


Route::get('/fetch-etudiants', [AjouteNoteController::class, 'indexx'])->name('fetch.etudiants');
Route::get('/fetch', [AjouteNoteController::class, 'index'])->name('fetch');

Route::get('reclamationscolariteetudiants', [ReclamationScolariteController::class, 'reclamationEtudiants'])->name('reclamation.data');
Route::get('paiementscolariteetudiants', [PaiementScolariteController::class, 'paiementEtudiants'])->name('paiement.data');
Route::get('paiementetudiants', [PaiementetudiantController::class, 'paiementEtudiantshistorique'])->name('getDataPaiementetudiant');
Route::get('/getPaidMonths', [PaiementetudiantController::class, 'getPaidMonths']);

Route::get('/fetch-etudiants', [AjouteNoteController::class, 'indexx'])->name('fetch.etudiants');
Route::get('/fetch', [AjouteNoteController::class, 'index'])->name('fetch');



Route::delete('/etudiants/{id}', [ListetudiantController::class, 'destroy'])->name('etudiants.destroy');

Route::delete('/personnel/{id}', [RhPersonnelControlleur::class, 'destroy'])->name('personnel.destroy');



Route::delete('/reclamation/{id}', [ReclamationScolariteController::class, 'destroy'])->name('reclamations.destroy');



Route::post('/import-etudiants', [EtudiantController::class, 'import'])->name('import.etudiants');

Route::get('/export-etudiants', [EtudiantController::class, 'export'])->name('export.etudiants');

Route::get('/f', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiant');
Route::get('et', [AjouteNoteController::class, 'index'])->name('get');
Route::get('//etudiants', [AjouteNoteController::class, 'getEtudiantsByCycle'])->name('etudiants');
Route::get('/etudiants-liste', [AjouteNoteController::class, 'getEtudiantsData'])->name('data');

Route::get('/liste-etudiants-presence', [ListePresenceController::class, 'getEtudiants'])->name('Listes');
Route::get('/Presence-etudiant', [ListePresenceController::class, 'getEtudiantsData'])->name('dataetudiant');

Route::post('/miseajour', [AjouteNoteController::class, 'update'])->name('profupdate');

Route::post('/update-absence', [ListePresenceController::class, 'saveAbsence'])->name('saveAbsence');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/import-etudiants', [EtudiantController::class, 'importExcel'])->name('import');


Route::get('/export-etudiants', [EtudiantController::class, 'exportExcel'])->name('export');
