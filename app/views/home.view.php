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
                                    <label for="dp_img" class="pointer position-absolute rounded rounded-circle bg-dark ji-center text-light" style="top: 3px; right: 0; width: 20px; height: 20px;">
                                        <i class="fa-regular fa-pen-to-square" style="font-size: 12px;" onclick="change_dp();"></i>
                                    </label>
                                    <input type="file" class="d-none" id="dp_img">
                                <?php endif; ?>
                            </div>
                        </div>
                        <span class="fw-bold opacity-75"><span class="user-name"><?php if (Auth::logged_in()) : ?><?= Auth::getFname() ?> <?= Auth::getLname() ?><?php else : ?>Guest<?php endif; ?></span><i class="fa-regular fa-pen-to-square col-1 pointer" onclick="name_edit1();"></i></span>
                        <div id="name_edit" class="d-none position-absolute border border-1 rounded-3 bg-white col-12 p-3" style="z-index: 9; left: 0;">
                            <input type="text" value="<?= Auth::getFname() ?>" id="user-fname" class="form-control mb-2" placeholder="First name">
                            <input type="text" value="<?= Auth::getLname() ?>" id="user-lname" class="form-control mb-3" placeholder="Last name">
                            <button class="btn btn-primary btn-sm" id="update-name-btn">Update</button>
                            <button class="btn btn-danger btn-sm" onclick="name_edit1()">Cancel</button>
                        </div>
                        <div class="position-relative text-start" style="font-size: 13px;">
                            <div class="disc m-0 ji-center my-1" id="see_all">
                                <?php if (Auth::logged_in()) : ?>
                                    <p class="opacity-75 m-0" id="user-bio"><?= Auth::getBio() ?></p>
                                    <p class="fw-bold opacity-75"><?php if(empty(Auth::getBio())): ?>Update bio <?php endif; ?><i class="fa-regular fa-pen-to-square col-2 pointer" onclick="name_edit2();"></i></p>
                                    <div id="bio_edit" class="d-none position-absolute border border-1 rounded-3 bg-white col-12 p-3" style="z-index: 9; left: 0;">
                                        <textarea class="form-control mb-3" placeholder="Add Bio" name="" id="user-bio-input" cols="30" rows="2" style="outline: none;"><?= Auth::getBio() ?></textarea>
                                        <button class="btn btn-primary btn-sm" id="update-bio-btn"><?php if(empty(Auth::getBio())): ?>Add<?php else: ?>Update<?php endif; ?></button>
                                        <button class="btn btn-danger btn-sm" onclick="name_edit2()">Cancel</button>
                                    </div>
                                <?php else : ?>
                                    <a href="<?= ROOT ?>/login" class="btn btn-primary d-block">Log In</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                        <?php if (Auth::logged_in()) : ?>
                            <div class="row">
                                <div class="col d-flex justify-content-between align-items-center">
                                    <input placeholder="add mobile number" id="mobile" type="text" class="col-10 opacity-75" readonly value="<?= Auth::getMobile() ?>" style="font-size: 14px; border: none;">
                                    <i class="opacity-75 fa-regular fa-pen-to-square col-2 pointer" onclick="open_edit1();" id="edit_icn1"></i>
                                    <button class="btn btn-primary btn-sm ms-1 d-none" style="font-size: 13px;" id="update_icon1">update</button>
                                </div>
                            </div>
                            <div class="text-start">
                                <span class="col-10 opacity-75" style="font-size: 14px; border: none;"><?= Auth::getEmail() ?></span><br>
                                <span class="col-10 opacity-75" style="font-size: 14px; border: none;"><?= Auth::getUsername() ?></span>
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

                            <div class="">
                                <input type="text" id="post-form-title" class="form-control mb-2" placeholder="Post title">
                            </div>
                            <div id="editor" class="rounded-bottom border border-1"></div>
                            <div class="mt-3 w-100">
                                <div class="row">
                                    <div class="col-lg-4 row mb-4">
                                        <div class="pointer opacity-75 fw-bold ji-center col position-relative">
                                            <label for="imageInput" class="pointer">
                                                <input type="file" class="d-none" id="imageInput" accept="image/*">
                                                <span id="add_post_img"><i class="fa-regular fa-image fs-5 pe-2" style="color: #378FE9;"></i>Images</span>
                                            </label>
                                            <div id="imagePreview">
                                            </div>
                                            <i class="fa-solid fa-circle-xmark position-absolute d-none" id="remove_post_img" onclick="remove_post_img();" style="right: 6px; top: -3px; z-index: 9;"></i>
                                        </div>
                                        <div class="pointer opacity-75 fw-bold ji-center col">
                                            <input type="text" class="form-control" id="autocomplete" name="city_town">
                                            <!-- <span><i class="fa-solid fa-location-dot fs-5 pe-2" style="color: #CB1410;"></i>Location</span> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 row mb-4 ji-center">
                                        <div class="col-6">
                                            <input type="hidden" value="<?= Auth::getId() ?>" id="user-id" />
                                            <select id="post-form-category" class="form-control select2" onchange="newPostEditing()">
                                                <option value="0">Post category</option>
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
                                    <div class="col-lg-2 mb-4 ji-center">
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
                                            <p class="m-0 fw-bold" style="font-size: 15px;"><?= $post->name ?></p>
                                            <p class="m-0" style="font-size: 12px;"><?= $post->username ?></p>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <?php if (Auth::logged_in() && Auth::getId() == $post->users_id) : ?>
                                            <span class="pointer" style="font-size: 12px;"><i class="fa-regular fa-pen-to-square pe-1"></i>Edit</span>
                                        <?php endif; ?>
                                        <p class="m-0 opacity-75" style="font-size: 12px;"><?= $post->time_diff ?></p>
                                    </div>
                                </div>
                                <div class="position-relative mt-2 disc1" style="font-size: 14px;" id="see_all_post-<?= $post->id ?>">
                                    <?= $post->description ?>
                                    <?php if (strlen($post->description) > 50) : ?>
                                        <span onclick="see_more_post(<?= $post->id ?>);" class=" pointer position-absolute " id="see_all_post1-<?= $post->id ?>" style="right: 0; bottom: 5px;  background-color: #FFFFFF; color: #378FE9; ">...see more</span>
                                    <?php endif; ?>
                                </div>
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
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

</main>

<?php $this->view('includes/footer') ?>