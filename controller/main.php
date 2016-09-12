<?php
namespace andreask\ium\controller;


class main
{
    /**
     * 
     * Main class for self deletion of inactive users
     * 
     */
    protected $config;
    protected $auth;
    protected $user;
    protected $request;
    protected $helper;
    protected $template;
    protected $u_action;


    public function __construct(\phpbb\config\config $config, \phpbb\auth\auth $auth, \phpbb\user $user, \phpbb\request\request $request, \phpbb\controller\helper $helper, \phpbb\template\template $template)
    {   
        $this->config   =   $config;
        $this->auth     =   $auth;
        $this->user     =   $user;
        $this->request  =   $request;
        $this->helper   =   $helper;
        $this->template =   $template;
        $this->u_action = append_sid(generate_board_url() . '/' . $this->user->page['page']);
        
        $this->user->add_lang_ext('andreask/ium', 'user_self_delete');
    }
    
    public function handle($random)
    {
        if ($this->config['andreask_ium_enable'] == 0 || $this->config['andreask_ium_self_delete'] == 0)
        {
            trigger_error($this->user->lang('PAGE_NOT_EXIST'), E_USER_WARNING);          
        }
        
        // Check to see if user is logged in.
        if ($this->user->data['user_id'] == ANONYMOUS)
        {
            login_box('', $this->user->lang('HAVE_TO_LOGIN'));
        }
        
        $form_key = 'andreask_ium';
        add_form_key($form_key);
            
        if ($this->request->is_set_post('submit') )
        {
            if ( !check_form_key($form_key) )
            {
                trigger_error($this->user->lang('FORM_INVALID') . $this->usr_back_link( $this->u_action ), E_USER_WARNING);
            }
            if ( $this->request->variable('self_delete_verify', 0) != 1)
            {
                trigger_error($this->user->lang('HAVE_TO_VERIFY') . $this->usr_back_link( $this->u_action ), E_USER_WARNING);
            }
            if ($this->delete_user($this->user->data['user_id']))
            {
                $this->user->session_kill(false);
                trigger_error($this->user->lang('USER_DELETED') . $this->usr_back_link( $this->u_action ), E_USER_NOTICE);
            }
        }
        
        $this->template->assign_vars(array(
                                        'RANDOM'    => $random,
                                        'U_ACTION'  => $this->u_action
                ));
        return $this->helper->render('ium_user_remove.html', 'User self deletion');
        
    }   
    
    private function usr_back_link($u_action)
    {
        return '<br /><br /><a href="' . $u_action . '">&laquo; ' . $this->user->lang['BACK_TO_PREV'] . '</a>';
    }
    
    private function delete_user($user_id)
    {
        return true;
    }
    
    private function validate_user()
    {
        return true;        
    }
    
}