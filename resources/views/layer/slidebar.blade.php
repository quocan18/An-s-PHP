<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a class="simple-text logo-mini">
            2K
        </a>
        <a class="simple-text logo-normal">
            Project 2
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                
            </div>
            <div class="info">
                <p style="color: white; font-weight: bold; font-size: medium;">
                    <span>
                        Nguyễn Quốc An
                        
                    </span>
                </p>
                
            </div>
        </div>
        <ul class="nav">
            
            <li>
                <a data-toggle="collapse" href="#pagesExamples">
                    
                    <p> More detail
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        @if (Session::has('admin_level'))
                        <li>
                                <a href="{{ route('view_all_students') }}">
                                    
                                    <span class="sidebar-normal"> Students </span>
                                </a>
                        </li>
                        <li>
                            <a href="{{ route('view_all_classes') }}">
                                
                                <span class="sidebar-normal"> Classes </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('view_all_subjects') }}">
                                
                                <span class="sidebar-normal"> Subjects </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('view_all_teacher') }}">
                                
                                <span class="sidebar-normal"> Teacher </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('select_classes_subjects') }}">
                                
                                <span class="sidebar-normal"> Score </span>
                            </a>
                        </li>
                        @endif
                        
                        
                        
                        
                        @if (Session::has('teacher_level'))
                        <li>
                            <a href="{{ route('select_classes_subjects') }}">
                                
                                <span class="sidebar-normal"> Score </span>
                            </a>
                        </li> 
                        @endif
                    </ul>
                </div>
            </li>
            
            <li class="active">
                <a href="{{ route('logout') }}">
                    
                    <p> Log out press here </p>
                </a>
            </li>
        </ul>
    </div>
</div>