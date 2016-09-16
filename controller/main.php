<?php
namespace andreask\ium\controller;

use Symfony\Component\DependencyInjection\ContainerInterface;

class main
{
    /**
     * 
     * Main class for self deletion of inactive users
     * 
     */

    protected $config;
    protected $db;
    protected $user;
    protected $request;
    protected $helper;
    protected $template;
    protected $container;
    protected $table_name;
    protected $u_action;

    public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\request\request $request, \phpbb\controller\helper $helper, \phpbb\template\template $template, ContainerInterface $container, $ium_table)
    {
        $this->config       =   $config;
        $this->db           =   $db;
        $this->user         =   $user;
        $this->request      =   $request;
        $this->helper       =   $helper;
        $this->template     =   $template;
        $this->container    =   $container;
        $this->table_name   =   $ium_table;
        $this->u_action     =   append_sid(generate_board_url() . '/' . $this->user->page['page']);
    }
    
    public function handle($random)
    {
        $this->user->add_lang_ext('andreask/ium', 'user_self_delete_page');

        // Don't forget to put this back!!!!!!!!
        // if ($this->config['andreask_ium_enable'] == 0 || $this->config['andreask_ium_self_delete'] == 0)
        if ($this->config['andreask_ium_self_delete'] == 0)
        {
            return $this->helper->error($this->user->lang('PAGE_NOT_EXIST'), 404);          
        }
        
        // Check to see if user is logged in.
        if ($this->user->data['user_id'] == ANONYMOUS)
        {
            return $this->helper->error(login_box('', $this->user->lang('HAVE_TO_LOGIN')), 403);
        }
    
        $form_key = 'andreask_ium';
        add_form_key($form_key);

        // The form get submited...
        if ($this->request->is_set_post('submit') )
        {
            if ( !check_form_key($form_key) )
            {
                $this->helper->error($this->user->lang('FORM_INVALID') . $this->usr_back_link( $this->u_action ), 403);
            }
            // Make sure confirm is selected
            if ( $this->request->variable('self_delete_verify', '') != 1)
            {
                return $this->helper->message($this->user->lang('HAVE_TO_VERIFY') . $this->usr_back_link( $this->u_action ));
            }
            if (! $this->user_check( $this->user->data['user_id'], $this->request->variable('random', '') ) )
            {
                return $this->helper->message($this->user->lang('NO_USER_FOUND') . $this->usr_back_link( $this->u_action ));
            }

            // Request to delete user...
            $delete_me = $this->container->get('andreask.ium.classes.delete_user');
            $delete_me->delete($this->user->data['user_id'], 'user');

            // log out user.
            $board_url = generate_board_url(). '/ucp.php?mode=logout&sid='. $this->user->session_id;
            $message = ($this->config['andreask_ium_approve_del']) ? $this->user->lang('NEEDS_APPROVAL', htmlspecialchars_decode($this->config['sitename'])) : $this->user->lang('USER_SELF_DELETE_SUCCESS', htmlspecialchars_decode($this->config['sitename']));
            
            // meta_refresh has to run before return because after return nothing is going to run...
            meta_refresh(5, $board_url );

            return $this->helper->message( $this->user->lang( $message ));
        }
        
        $this->template->assign_vars(array(
                                        'RANDOM'    => $random,
                                        'U_ACTION'  => $this->u_action
                ));
        
        return $this->helper->render('ium_user_remove.html', 'User self deletion');        
    }

    private function user_check($user, $random){

        $sql_arr = array(
            'user_id'   => $user,
            'random'    => $random);

        $sql = 'SELECT count(user_id) as user_count 
                FROM ' . $this->table_name . ' 
                WHERE ' . $this->db->sql_build_array('SELECT', $sql_arr);
        $result = $this->db->sql_query($sql);
        $count = $this->db->sql_fetchfield('user_count');
        $this->db->sql_freeresult($result);
        
        if($count == 0)
        {
            return false;
        }
        
        return true;
    }
    
    private function usr_back_link($u_action)
    {
        return '<br /><br /><a href="' . $u_action . '">&laquo; ' . $this->user->lang['BACK_TO_PREV'] . '</a>';
    }
}
