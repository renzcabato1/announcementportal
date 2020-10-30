<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::group( ['middleware' => 'auth'], function()
{

    Route::group(['middleware' => 'survey_access'], function () 
    { 
            
    Route::get('/ ','AnnouncementController@portal_links')->name('home'); 
    Route::get('/home','AnnouncementController@portal_links'); 
    // Route::get('/b','AnnouncementController@home_page_2'); 
    Route::get('/delete-announcement/{id}','AnnouncementController@delete_announcement'); 
    Route::get('/edit-announcement/{id}','AnnouncementController@edit_announcement'); 
    Route::post('/edit-announcement/{id}','AnnouncementController@save_edit_announcement'); 
    Route::post('/add-announcement','AnnouncementController@new_announcement'); 
    Route::post('/seen-announcement','AccountController@seen_by_user');
    Route::get('/delete-image/{id}','ImageController@delete_image'); 
    Route::get('/delete-attachment/{id}','AttachmentController@delete_attachment');
    Route::post('/add-portal','PortalController@new_portal'); 
    Route::get('/remove-portal/{id}','PortalController@delete_portal');  
    Route::post('/edit-portal/{id}','PortalController@save_update_portal'); 
    Route::post('/add-bulletin','BulletinController@add_bulletin'); 
    Route::get('/remove-bulletin/{id}','BulletinController@delete_bulletin');
    Route::post('edit-welcome','SettingController@change_welcome_message');
    Route::post('edit-description','SlideshowController@change_description');

    Route::post('new-forum','ForumController@new_forum');
    Route::get('/remove-forum/{id}','ForumController@delete_forum');
    Route::post('edit-forum/{id}','ForumController@edit_forum');

    Route::post('new-event','EventtController@new_event');
    Route::post('edit-event/{id}','EventtController@edit_event');
    Route::get('/remove-event/{id}','EventtController@delete_event');

    Route::post('new-poll','PollController@new_poll');
    Route::post('edit-poll/{id}','PollController@edit_poll');
    Route::get('/remove-poll/{id}','PollController@delete_poll');

    Route::post('vote-choice/{id}','PollController@vote_poll');
    Route::post('change-vote-choice/{id}','PollController@change_vote_poll');


    Route::post('add-headline','HeadlineController@add_headline');
    Route::get('remove-headline/{id}','HeadlineController@remove_headline');

    Route::post('add-resignation','UploadPdfController@upload_pdf');


    Route::get('/portal-links','AnnouncementController@portal_links'); 
    Route::get('/headlines','AnnouncementController@headlines');
    Route::post('/add-video','VideoController@new_video'); 


    Route::get('bulletin','AnnouncementController@bulletins');
    Route::get('polls','AnnouncementController@polls');
    Route::get('events','AnnouncementController@events');

    Route::get('globe-billing','AccountabilityController@globebilling');
    Route::post('save-excess/{id}','AccountabilityController@submit_excess');
    Route::get('for-approval','AccountabilityController@for_approval');
    Route::post('verify-excess/{id}','AccountabilityController@verify_excess');


    Route::post('cancel-resignation','CancelResignationController@cancel_resignation');
    Route::post('survey/{id}','SurveryController@submitsurvey');
    Route::post('survey-update/{id}','SurveryController@update_submitsurvey');
    Route::get('clearance','UploadPdfController@resigned_view');
    Route::get('join/{event_id}','EventJoinerController@join_event');
    Route::get('view-joiners/{event_id}','EventJoinerController@view_joiner');
    Route::get('survey-report','SurveyLimitController@view_report');
    Route::get('videos','VideoController@videos');
    Route::post('new-channel','VideoController@new_channel');
    Route::post('edit-channel/{channel_id}','VideoController@edit_channel');
    Route::get('reports','SurveyLimitController@reports');
});

Route::group(['middleware' => 'survey_done'], function () {
Route::get('survey-limited','SurveyLimitController@survey')->name('survey-limited');
Route::post('survey-add','SurveyLimitController@add_survey');
// Route::get('survey','SurveyLimitController@surveyRnD')->name('survey');
Route::get('survey','SurveyLimitController@surveyHR')->name('survey');
});
}

);
Route::get('video_view/{video_channel}','VideoController@view_video');
