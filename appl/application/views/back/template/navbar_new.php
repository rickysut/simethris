<nav id="toolbar" class="bg-white">
					<?php
						$ChatReceiver = $this->session->userdata('id_users');
						$jml_data_unverifikasi = $this->r_verifikasi_new->total_rows_unverif();
						$jml_chat_unread = $this->ChatModel->total_rows_unread($ChatReceiver);
					?>
                    <div class="row no-gutters align-items-center flex-nowrap">

                        <div class="col">

                            <div class="row no-gutters align-items-center flex-nowrap">

                                <button type="button" class="toggle-aside-button btn btn-icon d-block d-lg-none" data-fuse-bar-toggle="aside">
                                    <i class="icon icon-menu"></i>
                                </button>

                                <div class="toolbar-separator d-block d-lg-none"></div>

                                <div class="shortcuts-wrapper row no-gutters align-items-center px-0 px-sm-2">

                                    <div class="shortcuts row no-gutters align-items-center d-none d-md-flex">

                                        <a href="<?php echo base_url('chat')?>" class="shortcut-button btn btn-icon mx-1">
                                            <i class="icon icon-hangouts"></i><sub style="font-size: 10px"><span class="badge badge-warning status" id="total_unread_nav"><?php echo $jml_chat_unread ?></span></sub>
                                        </a>
										<?php if($this->session->userdata('usertype')!='3'){ ?>
											<a href="<?php echo base_url('contact')?>" class="shortcut-button btn btn-icon mx-1">
                                            <i class="icon icon-account-box"></i>
                                        </a> 
										<?php } ?>
                                        

                                        <a href="<?php echo base_url('calendar')?>" class="shortcut-button btn btn-icon mx-1">
                                            <i class="icon icon-calendar-today"></i>
                                        </a>

                                    </div>
                                </div>

                                <div class="toolbar-separator"></div>
                                <?php if(($this->router->class == 'verifikator_new') ||  (($this->router->class == 'verifikator_new') && ($this->router->method == 'view_company'))  && ($this->router->method != 'view_realisasi') && ($this->router->method != 'view_produksi')){

                                if($this->session->userdata('usertype')!='3'){ ?>
                                    
                                    <div class="shortcuts-wrapper row no-gutters align-items-center px-0 px-sm-2">

                                        <div class="shortcuts row no-gutters align-items-center d-none d-md-flex">
                                            <label style="padding-top:4px;margin-right:4px; font-weight:bold">Periode Tahun </label>
                                            <select id='date-dropdown'>

                                            </select>
                                            <script>
                                                let dateDropdown = document.getElementById('date-dropdown'); 
                                                let dateOption = document.createElement('option');          
                                                dateOption.text = "Semua";      
                                                dateOption.value = 0;     
                                                if (<?php echo $period_year ?> == 0 ){ 
                                                    dateOption.selected = true;  
                                                } 
                                                dateDropdown.add(dateOption);

                                                let currentYear = new Date().getFullYear();    
                                                let earliestYear = 2020;   
                                                let indexYear = currentYear;  
                                                while (indexYear >= earliestYear) {      
                                                    let dateOption = document.createElement('option');          
                                                    dateOption.text = indexYear;      
                                                    dateOption.value = indexYear; 
                                                    if (<?php echo $period_year ?> == indexYear ){ 
                                                        dateOption.selected = true;  
                                                    }        
                                                    dateDropdown.add(dateOption);      
                                                    indexYear -= 1;    
                                                }
                                                
                                            </script>
                                        </div>
                                    </div>
                                    <div class="toolbar-separator"></div>   
                                
                                <?php } 
                                }?>            
                            </div>
                        </div>

                        <div class="col-auto">

                            <div class="row no-gutters align-items-center justify-content-end">
								<?php if($this->session->userdata('usertype')!='3'){ ?>
									<button type="button" class="shortcut-button btn btn-icon mx-1">
                                    <i class="icon icon-bell-ring"></i><sub style="font-size: 10px"><span class="badge badge-warning status" id="total_unverifikasi_nav"><?php echo $jml_data_unverifikasi ?></span></sub>
                                </button>
								<?php } ?>
								<div class="dropdown-divider"></div>
                                <div class="user-menu-button dropdown">

                                    <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="avatar-wrapper">
                                            <?php if($this->session->photo_thumb == NULL){ ?>
											  <img  src="<?php echo base_url('assets/images/noimage.jpg') ?>" class="avatar" alt="No Image Found">
											<?php } else{ ?>
											  <img  src="<?php echo base_url('uploads/user/'.$this->session->photo_thumb) ?>" class="avatar" alt="<?php echo $this->session->name ?>">
											<?php } ?>
                                            <i class="status text-green icon-checkbox-marked-circle s-4"></i>
                                        </div>
                                        <span class="username mx-3 d-none d-md-block"><?php echo $this->session->name ?></span>
                                    </div>

                                    <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">

                                        <a class="dropdown-item" href="<?php echo base_url('auth/update_profile/'.$this->session->id_users) ?>">
                                            <div class="row no-gutters align-items-center flex-nowrap">
                                                <i class="icon-account"></i>
                                                <span class="px-3">My Profile</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="row no-gutters align-items-center flex-nowrap">
                                                <i class="status text-green icon-checkbox-marked-circle"></i>
                                                <span class="px-3">Online</span>
                                            </div>
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">
                                            <div class="row no-gutters align-items-center flex-nowrap">
                                                <i class="icon-logout"></i>
                                                <span class="px-3">Logout</span>
                                            </div>
                                        </a>

                                    </div>
                                </div>
								
                                <div class="toolbar-separator"></div>

                                <button type="button" class="quick-panel-button btn btn-icon" data-fuse-bar-toggle="quick-panel-sidebar">
                                    <i class="icon icon-format-list-bulleted"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>
                