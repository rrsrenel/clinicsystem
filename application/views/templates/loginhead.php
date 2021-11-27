<div class="container">
    <div class="row">
        <?php if(! is_null($msg)){
            {
            echo '<ul>
            <li>'.
            $this->session->userdata('fname')
            .'</li>
            <li><a href="'
            .base_url().
            'admins/do_logout">Log out</a></li>
            </ul>';
        }
            
            
        }
        else
        {
            echo '<ul>
            <li><a href="'
            .base_url().
            'login/index">Log in</a></li>
            <li>Register</li>
            </ul>';
        }
        ?> 
    </div>
</div>
