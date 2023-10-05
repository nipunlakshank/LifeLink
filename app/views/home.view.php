<?php $this->view('includes/header') ?>

<main>
    <div class="overflow-hidden py-5">
        <div class="offset-lg-1 col-lg-10">
            <div class="row">
                <div class="col-md-3 col-lg-4">
                    <div class="border border-1 shadow shadow-sm rounded-3 text-center p-3 position-relative">
                        <div class="ji-center py-2">
                            <div class="rounded rounded-circle border border-3 position-relative" style="width: 100px; height: 100px;">
                                <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="img-fluid" alt="">
                            </div>
                        </div>
                        <p class="fw-bold opacity-75">Kosala Chathuranga <i class="fa-regular fa-pen-to-square col-2 pointer" onclick="name_edit1();"></i></p>
                        <div id="name_edit" class="d-none position-absolute border border-1 rounded-3 bg-white col-12 p-3" style="z-index: 9; left: 0;">
                            <input type="text" value="Kosala" class="form-control mb-2" placeholder="First name">
                            <input type="text" value="Chathuranga" class="form-control mb-3" placeholder="Last name">
                            <button class="btn btn-primary btn-sm">Update</button>
                            <button class="btn btn-danger btn-sm" onclick="name_edit1()">Cancel</button>
                        </div>
                        <div class="position-relative text-start" style="font-size: 13px;">
                            <div class="disc m-0" id="see_all">
                                <p class="opacity-75 m-0">Excited to share that I've completed the intensive 5-day Swimming and Water Survival Training Course conducted by the Sri Lanka Police. This course delved beyond swimming techniques, focusing on the psychology and physica</p>
                            </div>
                            <span class="see_more m-0" onclick="see_more();" id="show_more">Read more</span>
                            <span class="see_more m-0 d-none" onclick="see_more();" id="show_less">Show less</span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input id="mobile" type="text" class="col-10 opacity-75" readonly value="0757033713" style="font-size: 14px; border: none;">
                                <i class="fa-regular fa-pen-to-square col-2 pointer" onclick="open_edit1();" id="edit_icn1"></i>
                                <button class="btn btn-primary btn-sm ms-1 d-none" style="font-size: 13px;" id="update_icon1">update</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input id="mobile" type="text" class="col-10 opacity-75" readonly value="chathurangakosala65@gmail.com" style="font-size: 14px; border: none;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input id="mobile" type="text" class="col-10 opacity-75" readonly value="@kosala541" style="font-size: 14px; border: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-lg-8">
                    <div class="border border-1 shadow shadow-sm rounded-3">

                    </div>

                </div>
            </div>
        </div>
    </div>

</main>

<?php $this->view('includes/footer') ?>