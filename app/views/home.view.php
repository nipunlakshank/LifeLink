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
                    <div class="border border-1 shadow shadow-sm rounded-3 text-center p-3 my-2 position-relative">
                        <div class="mb-4 position-relative p-1 d-flex align-items-center border border-1 rounded rounded-2">
                            <i class="fa-solid fa-magnifying-glass mx-2 opacity-75"></i>
                            <input type="text" value="#" class="col-10" style="outline: none; border: none; background-color: #00000000;" placeholder="Search by keyword or tag...">
                        </div>
                        <select id="search_categories" class="form-control select2">
                            <option value="0">Search by category</option>
                            <?php foreach ($categories ?? [] as $cat) : ?>
                                <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-9 col-lg-8">
                    <div class="border border-1 shadow shadow-sm rounded-3 mb-4">
                        <div class="p-3 position-relative">

                            <div id="editor" class="rounded-bottom">
                            </div>
                            <!-- <textarea class="form-control" placeholder="Start a post" name="" id="" cols="30" rows="6" style="outline: none;"></textarea> -->
                            <div class="mt-3 w-100">
                                <div class="row">
                                    <div class="col-lg-4 row mb-4">
                                        <div class="pointer opacity-75 fw-bold ji-center col"><i class="fa-regular fa-image fs-5 pe-2" style="color: #378FE9;"></i>Images</div>
                                        <div class="pointer opacity-75 fw-bold ji-center col"><i class="fa-solid fa-location-dot fs-5 pe-2" style="color: #CB1410;"></i>Location</div>
                                    </div>
                                    <div class="col-lg-6 row mb-4 ji-center">
                                        <div class="col-6">
                                            <input type="hidden" value="<?= Auth::getId() ?>" id="user-id" />
                                            <select id="post-form-category" class="form-control select2" onchange="newPostEditing()">
                                                <option value="0">Select post category</option>
                                                <?php foreach ($categories ?? [] as $cat) : ?>
                                                    <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select id="post-form-type" class="select2 form-control">
                                                <?php foreach ($types ?? [] as $type) : ?>
                                                    <option value="<?= $type->id ?>"><?= $type->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                        <button class="btn btn-primary fw-bold col-12" id="post-form-btn" disabled="true">POST</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($posts as $post) : ?>
                        <div class="border border-1 shadow shadow-sm rounded-3 mb-4">
                            <div class="p-3 position-relative">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ji-center">
                                        <div class="position-relative rounded rounded-circle" style="width: 35px; height: 35px;">
                                            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" alt="" class="img-fluid">
                                        </div>
                                        <div class=" ps-2">
                                            <p class="m-0 fw-bold" style="font-size: 15px;"><?= Auth::getFname() ?> <?= Auth::getLname() ?></p>
                                            <p class="m-0" style="font-size: 12px;"><?= Auth::getUsername() ?></p>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <span class="pointer" style="font-size: 12px;"><i class="fa-regular fa-pen-to-square pe-1"></i>Edit</span>
                                        <p class="m-0 opacity-75" style="font-size: 12px;"><?= $post->time_diff ?></p>
                                    </div>
                                </div>
                                <div class="position-relative mt-2 disc1" style="font-size: 14px;" id="see_all_post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus quam, faucibus id pulvinar et, placerat ac urna. Donec laoreet mollis lacus, sed dignissim nulla mollis a. Quisque tempor fermentum massa, at porta nibh vulputate at. Phasellus placerat, quam eget fringilla sodales, leo sem accumsan metus, a scelerisque ante metus et odio. Maecenas consectetur ipsum tortor, et rhoncus eros maximus eu. Fusce luctus neque ac ipsum porttitor faucibus. Nullam eget mauris ligula. Curabitur iaculis commodo libero at ultrices. Proin at libero enim. Cras ac libero a libero consequat porttitor sit amet a metus. Curabitur in sodales diam. Etiam dictum efficitur arcu sed interdum. Suspendisse in tellus quis tortor congue lobortis quis at lectus. Aenean aliquam a tellus nec luctus. Fusce faucibus finibus enim, vel convallis est finibus et.
                                    <span onclick="see_more_post();" class=" pointer position-absolute " id="see_all_post1" style="right: 0; bottom: 5px;  background-color: #FFFFFF; color: #378FE9; ">...see more</span>
                                </div>
                                <!-- <div class="mt-2" style="font-size: 14px;">
                                For decades, math has been widely cited as Americans' least favorite subject, and algebra is the most frequently failed high school course in the country. But perhaps the problem isn’t that students can’t keep up with what they learn
                            </div> -->
                                <div class="col-12 position-relative mt-2" style="height: auto;">
                                    <img src="https://img.freepik.com/free-photo/woman-sitting-grass-checking-her-phone_23-2148739296.jpg" alt="" style="width: 100%;">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ji-center">
                                        <p class="me-4 m-0 ji-center pointer" style="font-size: 20px;">
                                            <!-- <i class="opacity-50 fa-solid fa-thumbs-up pe-2"></i> -->
                                            <i class="fa-solid fa-thumbs-up pe-2" style="color: #378FE9;"></i>
                                            <span class="flex_lg" style="font-size: 13px;">Upvote</span>
                                        </p>
                                        <p class="me-4 m-0 ji-center pointer" style="font-size: 20px;">
                                            <!-- <i class="opacity-50 fa-solid fa-thumbs-up fa-rotate-180 ps-2"></i> -->
                                            <i class="fa-solid fa-thumbs-up fa-rotate-180 ps-2" style="color: #ff906c;"></i>
                                            <span class="flex_lg" style="font-size: 13px;">Downvote</span>
                                        </p>
                                        <p onclick="open_chat(<?= $post->id ?>);" class="me-4 m-0 ji-center pointer" style="font-size: 20px;"><i class="opacity-50 fa-solid fa-message pe-2"></i><span class="flex_lg" style="font-size: 13px;">Comment</span></p>
                                    </div>
                                    <div class="">
                                        <span class="opacity-75 pe-3" style="font-size: 13px;">7 upvote</span>
                                        <span class="opacity-75" style="font-size: 13px;">3 downvote</span>
                                    </div>
                                </div>
                                <div class="py-4 d-none" id="chat_div-<?= $post->id ?>">
                                    <div class="ji-center col-12 position-relative">
                                        <div class="position-relative rounded rounded-circle" style="width: 45px; height: 45px;">
                                            <?php if (file_exists(SERVER_ROOT . "/public/images/users/" . Auth::getImg())) : ?>
                                                <img src="<?= PUBLIC_ROOT ?>/assets/images/users/<?= Auth::getImg() ?>" alt="" class="img-fluid">
                                            <?php else : ?>
                                                <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" alt="" class="img-fluid">
                                            <?php endif; ?>
                                        </div>
                                        <textarea class="form-control ms-3 pe-5" name="" id="" cols="30" rows="2"></textarea>
                                        <div class="ji-center position-absolute" style="right: 13px;">
                                            <i class="fa-solid fa-paper-plane fs-3 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="position-relative" id="cardContainer">

                                        <?php foreach ($post->comments as $comment) : ?>
                                            <div class="card_div">
                                                <div class="border-bottom mt-4 d-flex">
                                                    <div class="col-lg-1 col-md-1 col-sm-2">
                                                        <div class="rounded-circle ji-centered" style="background-image: url(https://fiverr-res.cloudinary.com/image/upload/f_auto,q_auto,t_profile_small/v1/attachments/profile/photo/ecb924c7b3195c692127557f2c6385c8-638721441668843162.71172/6B4F23C6-F02D-4CCF-95A4-E8796DD1AF10); background-size: cover; width: 40px; height: 40px; background-color: #ff7300; cursor: pointer;">
                                                        </div>
                                                    </div>
                                                    <div class="ps-1 col-lg-11 col-md-11 col-sm-10">
                                                        <div class="ps-1 col-lg-11 col-md-11 col-sm-10">
                                                            <div class="p-3 pt-2 pb-2 mb-3" style="background-color: #f2f2f2; border-radius: 0 9px 9px 9px;">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="fw-bold opacity-75 m-0" style="font-size: 15px;"><?= $comment->name ?></p>
                                                                    <p class="opacity-75 m-0 ps-2" style="font-size: 11px;"><?= $comment->time_diff ?></p>
                                                                </div>
                                                                <div class="m-0">
                                                                    <span class="opacity-75" style="font-size: 14px;">
                                                                        <?= $comment->comment ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        </div>
                </div>
            </div>

</main>

<?php $this->view('includes/footer') ?>