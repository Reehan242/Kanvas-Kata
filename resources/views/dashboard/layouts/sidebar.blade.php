{{-- <div class="border border-right col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Han Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-lg-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard') ? '' : 'text-dark' }}"
                        aria-current="page" href="/dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/posts*') ? '' : 'text-dark' }}"
                        href="/dashboard/posts">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                            <path
                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z" />
                        </svg>
                        My Post
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/likes*') ? '' : 'text-dark' }}"
                        href="{{ route('dashboard.likes') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                            <path
                                d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                        </svg>
                        My Liked Post
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/comments*') ? '' : 'text-dark' }}"
                        href="{{ route('dashboard.comments') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                        </svg>
                        My Comments
                    </a>
                </li>
            </ul>

            @can('admin')
                <hr class="my-3">
                <h1 class="sidebar-heading d-flex justify-content-beetween align-items-center px-3 mt-1 mb-1 text-muted">
                    <span>ADMINISTRATOR</span>
                </h1>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/categories*') ? '' : 'text-dark' }}"
                            href="/dashboard/categories">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-tags-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                <path
                                    d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043z" />
                            </svg>
                            Post Categories
                        </a>
                    </li>
                </ul>
            @endcan

            <hr class="my-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center gap-2 text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
            <canvas class="my-4" id="myChart" style="height: 60vh"></canvas>
        </div>

    </div>
</div> --}}



<div class="ps-2 mt-2" style=" position: sticky; top: 10px; z-index: 1;">
    <div class="row justify-content-between">
        <div class="col-6">
            <h4 class="text-light mt-2 pb-2 ps-3">Dashboard</h4>
        </div>    
        <div class="col-6 text-end">
            <div class="offcanvas-header ">
                <button type="button" class="btn-close text-end" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    
    <hr class="text-light" style=" position: sticky; top: 0; z-index: 1;">

    <div class="offcanvas-body d-xl-flex flex-column p-0 pt-xl-3 overflow-y-auto" style=" position: sticky; top: 0; z-index: 1;">
        <ul class="nav flex-column my-2">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard') ? '' : 'text-light' }}"
                    aria-current="page" href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/posts*') ? '' : 'text-light' }}"
                    href="/dashboard/posts">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z" />
                    </svg>
                    My Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/likes*') ? '' : 'text-light' }}"
                    href="{{ route('dashboard.likes') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                    </svg>
                    My Liked Post
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/comments*') ? '' : 'text-light' }}"
                    href="{{ route('dashboard.comments') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                    </svg>
                    My Comments
                </a>
            </li>
        </ul>

        @can('admin')
            <h6 class="ps-3 pt-3 my-2 text-warning border-top border-light ">
                <span>[ ADMINISTRATOR ]</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('dashboard/categories*') ? '' : 'text-light' }}"
                        href="/dashboard/categories">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-tags-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                            <path
                                d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043z" />
                        </svg>
                        Post Categories
                    </a>
                </li>
            </ul>
        @endcan

        <ul class="nav flex-column border-top border-light my-5">
            <li class="nav-item mt-5">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link d-flex align-items-center gap-2 text-light ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>


</div>
