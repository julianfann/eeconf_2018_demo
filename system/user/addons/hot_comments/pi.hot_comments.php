<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Hot_comments
 */
class Hot_comments {

    /**
     * Setup FormGrab conventions for form tag
     */
    public function form()
    {
        $entryId = ee()->TMPL->fetch_param('entry_id');
        $title = ee()->TMPL->fetch_param('title');

        $data = [
            [
                'form_name' => 'comments_'.$entryId,
                'form_title' => "Comments for '".$title."'",
            ]
        ];

        return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $data);
    }

    /**
     * Get comments by entry id
     */
    public function get()
    {
        $entryId = ee()->TMPL->fetch_param('entry_id');

        $form = ee('Model')->get('formgrab:Form')->filter('name', 'comments_'.$entryId)->first();

        if(is_null($form)){
            return ee()->TMPL->no_results;
        }

        $submissions = ee('formgrab:Form')->getSubmissionByFormId($form->form_id);

        $comments = [];

        foreach($submissions as $submission){

            $data = json_decode($submission->data);

            $comments[] = [
                'date' => (new DateTime('now', new DateTimeZone('UTC')))->setTimestamp($submission->created_at)->setTimezone(new DateTimeZone('America/Chicago'))->format('m-d-Y g:ia'),
                'name' => $data->name,
                'email' => $data->email,
                'message' => $data->message,
            ];
        }

        if(!$comments){
            return ee()->TMPL->no_results;
        }

        return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $comments);
    }

    /**
     * Count comments by entry id
     */
    public function count()
    {
        $entryId = ee()->TMPL->fetch_param('entry_id');

        $form = ee('Model')->get('formgrab:Form')->filter('name', 'comments_'.$entryId)->first();

        if(is_null($form)){
            return ee()->TMPL->no_results;
        }

        $count = ee('Model')->get('formgrab:FormSubmission')->filter('form_id', $form->form_id)->count();

        if(!$count){
            return ee()->TMPL->no_results;
        }

        $data = [
            [
                'comment_count' => $count
            ]
        ];

        return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $data);
    }
}