<?php $this->view('includes/header') ?>

<main>
    <div class="overflow-hidden py-5">
        <div class="offset-lg-1 col-lg-10">
            <div class="row">
                <div class="col-md-3 col-lg-4">
                    <div class="border border-1 shadow shadow-sm rounded-3 text-center p-3 position-relative">
                        <div class="ji-center py-2">
                            <div class="rounded rounded-circle border border-3 position-relative" style="width: 100px; height: 100px;">
                                <?php if (Auth::logged_in() && file_exists(SERVER_ROOT . "/public/assets/images/users/" . Auth::getImg())) : ?>
                                    <img src="<?= PUBLIC_ROOT ?>/assets/images/users/<?= Auth::getImg() ?>" class="img-fluid" alt="Profile Picture">
                                <?php else : ?>
                                    <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="img-fluid" alt="Profile Picture">
                                <?php endif; ?>
                            </div>
                        </div>
                        <span class="fw-bold opacity-75"><?php if (Auth::logged_in()) : ?><?= Auth::getFname() ?> <?= Auth::getLname() ?><?php else : ?>Guest<?php endif; ?><i class="fa-regular fa-pen-to-square col-1 pointer" onclick="name_edit1();"></i></span>
                        <div id="name_edit" class="d-none position-absolute border border-1 rounded-3 bg-white col-12 p-3" style="z-index: 9; left: 0;">
                            <input type="text" value="Kosala" class="form-control mb-2" placeholder="First name">
                            <input type="text" value="Chathuranga" class="form-control mb-3" placeholder="Last name">
                            <button class="btn btn-primary btn-sm">Update</button>
                            <button class="btn btn-danger btn-sm" onclick="name_edit1()">Cancel</button>
                        </div>
                        <div class="position-relative text-start" style="font-size: 13px;">
                            <div class="disc m-0 ji-center my-1" id="see_all">
                                <?php if (Auth::logged_in()) : ?>
                                    <p class="opacity-75 m-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium a corporis numquam corrupti ipsa rerum voluptatum, laboriosam ducimus, vero sunt voluptatibus architecto ipsum unde, animi repellat sit eos quibusdam modi! Eum alias vitae fuga ab nesciunt aspernatur excepturi distinctio fugiat iure, temporibus culpa tempore sequi. Aperiam sequi praesentium magnam accusamus facilis quae voluptatum tenetur voluptatem hic aut, laborum ad nihil. Incidunt eveniet est reiciendis expedita modi maiores tempore commodi, voluptate, quas nostrum qui quae dolores a eius quod omnis ex quo aspernatur, distinctio ipsa velit porro? Fugiat harum nostrum in inventore rerum incidunt quisquam dolores ea expedita. Eius enim ea ex necessitatibus vero iure quod iusto perferendis natus impedit? Voluptas vero autem eveniet assumenda harum deleniti ipsa error unde, quaerat quia, molestiae similique qui? Numquam, porro temporibus. Ea error omnis sit? Possimus quod neque corrupti repellat magnam suscipit, voluptatibus fugiat quam ea tempore vel inventore velit laboriosam non quidem pariatur dolorum. Eum, autem numquam incidunt nobis eius delectus quam dolorum quidem iure, voluptatibus optio qui quos dignissimos quibusdam doloribus itaque sequi? Laudantium facere maxime soluta nihil cupiditate saepe nisi repellat minima, ut libero harum commodi quo repudiandae voluptatem corporis? Minima adipisci quaerat similique ad ducimus tenetur neque perspiciatis aspernatur accusamus?<?= Auth::getBio() ?></p>
                                <?php else : ?>
                                    <a href="<?= ROOT ?>/login" class="btn btn-primary d-block">Log In</a>
                                <?php endif; ?>
                            </div>
                            <?php if (Auth::logged_in()) : ?>
                                <span class="see_more m-0" onclick="see_more();" id="show_more">Read more</span>
                                <span class="see_more m-0 d-none" onclick="see_more();" id="show_less">Show less</span>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <?php if (Auth::logged_in()) : ?>
                            <div class="row">
                                <div class="col d-flex justify-content-between align-items-center">
                                    <input id="mobile" type="text" class="col-10 opacity-75" readonly value="<?= Auth::getMobile() ?>" style="font-size: 14px; border: none;">
                                    <i class="fa-regular fa-pen-to-square col-2 pointer" onclick="open_edit1();" id="edit_icn1"></i>
                                    <button class="btn btn-primary btn-sm ms-1 d-none" style="font-size: 13px;" id="update_icon1">update</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-between align-items-center">
                                    <input id="mobile" type="text" class="col-10 opacity-75" readonly value="<?= Auth::getEmail() ?>" style="font-size: 14px; border: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-between align-items-center">
                                    <input id="mobile" type="text" class="col-10 opacity-75" readonly value="<?= Auth::getUsername() ?>" style="font-size: 14px; border: none;">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-9 col-lg-8">
                    <div class="border border-1 shadow shadow-sm rounded-3">
                        <div class="p-3">
                            <textarea class="form-control" placeholder="Start a post" name="" id="" cols="30" rows="6" style="outline: none;"></textarea>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="ji-center">
                                    <div class="pointer opacity-75 fw-bold ji-center"><i class="fa-regular fa-image fs-2 pe-2" style="color: #378FE9;"></i>Images</div>
                                    <div class="pointer opacity-75 fw-bold ji-center ms-5"><i class="fa-solid fa-location-dot fs-2 pe-2" style="color: #CB1410;"></i>Location</div>
                                </div>
                                <button class="btn btn-primary fw-bold" disabled>
                                    POST
                                </button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</main>

<?php $this->view('includes/footer') ?>