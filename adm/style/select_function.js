function andreask_ium_selector_switch(action)
{
    const noposts_user_list = $('input[id*="no-posts"]');
    if (action === 'mark')
    {
        noposts_user_list.map(function(key, value)
        {
            value.checked = true;
        });
    }
    else
    {
        noposts_user_list.map(function(key, value)
        {
            value.checked = false;
        });
    }
}