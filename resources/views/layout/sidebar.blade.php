<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar" data-bs-theme="dark">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        <img src="{{ asset('uploads') }}/foto_user/{{ Auth::user()?->foto_user }}" width="50px" height="80px" alt="" /> 
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">{{ Auth::user()?->nama }}</div>
                        </div>
                        <small>{{ Auth::user()?->role }}</small>
                    </div>
                </a>
            </div>

            <br>

            <!-- Menu Administrator -->
            @if (Auth::user()->role == 'Admin')
                <div class="menu-item">
                    <a href="/home" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-house"></i>
                        </div>
                        <div class="menu-text">Dashboard</div>
                    </a>
                </div>
            
                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="list-outline"></ion-icon>
                        </div>
                        <div class="menu-text">KIB Aset Tetap</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/kib-tanah" class="menu-link">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/kib-alat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                        <div class="menu-text">Distribusi Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="card-outline"></ion-icon>
                        </div>
                        <div class="menu-text">Penyusutan Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="checkmark-done-outline"></ion-icon>
                        </div>
                        <div class="menu-text">Reklas Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="calculator-outline"></ion-icon>
                        </div>
                        <div class="menu-text">Laporan Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-cog"></i>
                        </div>
                        <div class="menu-text">Pengaturan</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Kode Aset</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/kode-ruang" class="menu-link">
                                <div class="menu-text">Kode Ruangan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Daftar User</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Menu Administrator -->


            <!-- Menu Operator -->
            @if (Auth::user()->role == 'Operator')
                <div class="menu-item">
                    <a href="/home" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="calendar-outline" class="bg-pink"></ion-icon> 
                        </div>
                        <div class="menu-text">Dashboard</div>
                    </a>
                </div>
            
                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="color-filter-outline" class="bg-indigo"></ion-icon>
                        </div>
                        <div class="menu-text">KIB Aset Tetap</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="logo-paypal" class="bg-pink"></ion-icon>
                        </div>
                        <div class="menu-text">Distribusi Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="logo-apple" class="bg-success text-black"></ion-icon>
                        </div>
                        <div class="menu-text">Penyusutan Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="logo-tiktok" class="bg-primary"></ion-icon>
                        </div>
                        <div class="menu-text">Reklas Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <ion-icon name="logo-amazon" class="bg-red"></ion-icon>
                        </div>
                        <div class="menu-text">Laporan Aset</div> 
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="/klasifikasi" class="menu-link" target="_blank">
                                <div class="menu-text">Tanah</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/pejabat" class="menu-link">
                                <div class="menu-text">Peralatan Dan Mesin</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Gedung Dan Bangunan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Jalan Dan Jaringan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="/user" class="menu-link">
                                <div class="menu-text">Aset Tetap Lain</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Menu Operator -->

            <!-- BEGIN minify-button -->
            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none" data-toggle="app-sidebar-minify"><ion-icon name="arrow-back" class="me-1"></ion-icon> <div class="menu-text">Hide</div></a>
            </div>
            <!-- END minify-button -->
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>
<div class="app-sidebar-bg" data-bs-theme="dark"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
<!-- END #sidebar -->
