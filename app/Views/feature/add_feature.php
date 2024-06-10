
<style>

    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }

    .rtl {
        direction: rtl;
    }

    .rtl .avatar {
        margin-left: 10px;
    }

    .sms_a_custom_file_input {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_custom_file_input input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .sms_a_custom_file_input label {
        padding: 17px 16px;
        border: 1px solid #ced4da;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        background-color: white !important;
        text-align: center;
    }

    .custom-file-input label i {
        margin-right: 5px;
    }

    .sms_a_swatches_preview {
        width: 31%;
    }

    .form-colorinput-color {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .color-selection {
        display: inline-flex;
        align-items: center;
        border: 1px solid #ced4da;
        /* Bootstrap default border color */
        border-radius: 0.25rem;
        /* Bootstrap default border radius */
        padding: 0.375rem 0.75rem;
        width: 100%;
        background-color: white;
    }

    .color-display {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .sms_a_add_feaeture_inputs_css {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: white;
        border: none;
        outline: none;
        font-size: 1rem;
        color: #212529;
        width: 100%;

    }

    .sms_a_add_feaeture_inputs_css option {
        background-color: #fff;
        color: #212529;

    }


    @media screen and (max-width: 767px) {
        .sms_a_swatches_preview {
            width: 48%;
        }

    }

    @media screen and (max-width: 457px) {
        .sms_a_swatches_preview {
            width: 100%;
        }

    }

    .chosen-container-multi {
        width: 100% !important;
        /* padding: 3%; */
        height: 20% !important;
        /* background-color: #fff; */
    }

    .chosen-choices {
        background-color: none !important;
        background-image: none !important;
        background-image: none !important;
        padding: 14px 15px !important;
    }

    .chosen-container.chosen-with-drop .chosen-drop {
        margin-top: 10px !important;
        border: none !important;
    }

    .chosen-container.chosen-with-drop .chosen-drop ul li {
        padding: 10px !important;
    }

    .chosen-container-multi ul {
        height: 100% !important;
        border-radius: 5px;
    }

    /* .chosen-container-multi .chosen-choices */
    .chosen-container-multi .chosen-choices {
        background-color: transparent !important;
    }

    .sms_manage_feature_pop {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        z-index: 9999;
        text-align: center;
        box-shadow: 100vh 100vh 100vh 300vh #00000059;
}

    .sms_manage_feature_pop svg {
        fill: green;
        width: 64px;
        height: 64px;
        margin-bottom: 20px;
    }

    .sms_manage_feature_pop h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .sms_manage_feature_pop .text-muted {
        color: #6c757d;
        font-size: 1rem;
    }
</style>
<!-- </head>

<body> -->

    <div class="container-xl" style="height: 570px; overflow-y:auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="">
                    <form class="card-body">
                        <!-- header -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input" class="form-label"  data-i18n="popoups.future_managment.add_new_feature.color_select_atr">The attribute name</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_attribute_name"
                                    placeholder="Attribute Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"  data-i18n="popoups.future_managment.add_new_feature.d_type">Display Type (Color/Image)</label>
                                <div class="h-100">
                                    <select class="form-select form-select-md h-80 bg-transparent"
                                        id="sms_attribute_select" style="    height: 66%;">
                                        <option value="color">Color</option>
                                        <option value="image">Image</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Adding terms to the feature -->
                        <div class="rounded-4 mt-4" style="background-color: #EAEAEA">
                            <div class="col-12 col-md-12 rounded-2" id="sms_a_add_feature">
                                <div class="py-3 rounded">
                                    <h3 class="card-title text-black fs-2 fw-bold p-2" style="font-size: 35px;"  data-i18n="popoups.future_managment.add_new_feature.hero_heading">
                                        Adding terms to the feature</h3>
                                </div>
                                <!-- <div class="p-2">
                                        <div class="col-md-12 mb-3">
                                            <label for="example-text-input" class="form-label">The name of the
                                                term</label>
                                            <input type="text" class="form-control text-dark rounded-2 py-3 " id="example-text-input"
                                                placeholder="Pink">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                <label class="form-label">Selecting an image to display the term</label>
                                                <div class="sms_a_custom_file_input">
                                                    <input type="file" id="image-input" accept="image/*"
                                                        style="background-color:#FFFFFF;" onchange="showFileName(this)">
                                                    <label for="image-input"><i class="bi bi-image text-black"></i> <svg
                                                            width="20" height="20" viewBox="0 0 32 26" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                                fill="black" />
                                                        </svg>
                                                        Selecting an image </label>
                                                </div>
                                            </label>
                                        </div>

                                    </div> -->

                            </div>
                            <!-- To add another term click here + -->
                            <div class="text-center mt-4 p-3 ">
                                <button type="button" onclick="sms_a_add_features()"
                                    class="btn btn-primary col-12 col-md-12 rounded-4 py-3" data-i18n="popoups.future_managment.add_new_feature.term_end_btn">To add
                                    another term click here +</button>
                            </div>

                        </div>

                        <div class="py-3 rounded">
                            <h3 class="card-title text-black fs-2 fw-bold p-2" style="font-size: 35px;"  data-i18n="popoups.future_managment.add_new_feature.hero_heading">Adding terms
                                to the feature</h3>
                        </div>

                        <div class="row flex-row gap-3">
                            <div class="sms_a_swatches_preview rounded-4 mt-2 "
                                style="background-color: #EAEAEA; padding: 20px;">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label fs-2 " data-i18n="popoups.future_managment.add_new_feature.add_new_term_feature.card_selection.h1">Selection Field</label>
                                    <div class="col-auto ms-auto">
                                        <label class="form-colorinput form-colorinput-light">
                                            <input type="checkbox" value="white" class="form-colorinput-input"
                                                name="gender" id="checkbox1" onclick="fun_checkbox1()">
                                            <span class="form-colorinput-color bg-white rounded-circle"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="h-100 bg-white">
                                        <select class="form-select form-select-md h-100 bg-transparent">
                                            <option value="HTML">Add Feature</option>
                                            <option value="Jquery">Custom Features</option>
                                        </select>
                                    </div>
                                    <!-- <div class="color-selection">
                                        <span id="colorDisplay" class="color-display"></span>
                                      
                                        <svg id="selectColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.646 5.646a.5.5 0 0 1 .708 0L8 11.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>

                                    </div> -->
                                </div>
                            </div>


                            <div class="sms_a_swatches_preview rounded-4 mt-2 "
                                style="background-color: #EAEAEA; padding: 20px;">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label fs-2 "  data-i18n="popoups.future_managment.add_new_feature.add_new_term_feature.card_Radio_buttons.h1">Radio buttons</label>
                                    <div class="col-auto ms-auto">
                                        <label class="form-colorinput form-colorinput-light">
                                            <input type="checkbox" value="white" class="form-colorinput-input"
                                                name="gender" id="checkbox2" onclick="fun_checkbox2()">
                                            <span class="form-colorinput-color bg-white rounded-circle"></span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="row g-2 mb-2">
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-circle text-dark ">XL</span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span
                                                    class="form-colorinput-color rounded-circle text-dark  text-center">L</span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-circle text-dark ">M</span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-circle text-dark ">S</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color  rounded-circle"
                                                    style="background-color: #CAA211"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color-rounded" class="form-colorinput-input" checked="">
                                                <span class="form-colorinput-color  rounded-circle"
                                                    style="background-color: #4987D8"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" value="blue" class="form-colorinput-input">
                                                <span class="form-colorinput-color  rounded-circle"
                                                    style="background-color: #A30505"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color  rounded-circle"
                                                    style="background-color: #DC2285"></span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="sms_a_swatches_preview rounded-4 mt-2 "
                                style="background-color: #EAEAEA; padding: 20px;">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label fs-2 "  data-i18n="popoups.future_managment.add_new_feature.add_new_term_feature.card_selection.h2">Rounded edges</label>
                                    <div class="col-auto ms-auto">
                                        <label class="form-colorinput form-colorinput-light">
                                            <input name="color-rounded" type="checkbox" value="white"
                                                class="form-colorinput-input" name="gender" id="checkbox3"
                                                onclick="fun_checkbox3()">
                                            <span class="form-colorinput-color bg-white rounded-circle"></span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="row g-2 mb-2">
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-2 text-dark ">XL</span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color-rounded" class="form-colorinput-input" name="gender"
                                                    onclick="fun_checkbox()">
                                                <span
                                                    class="form-colorinput-color rounded-2 text-dark  text-center">L</span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-2 text-dark ">M</span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-2 text-dark ">S</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color  rounded-2"
                                                    style="background-color: #CAA211"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color-rounded" class="form-colorinput-input" name="gender"
                                                    onclick="fun_checkbox()">
                                                <span class="form-colorinput-color  rounded-2"
                                                    style="background-color: #4987D8"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" value="blue" class="form-colorinput-input"
                                                    name="gender" onclick="fun_checkbox()">
                                                <span class="form-colorinput-color  rounded-2"
                                                    style="background-color: #A30505"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input" name="gender"
                                                    onclick="fun_checkbox()">
                                                <span class="form-colorinput-color  rounded-2"
                                                    style="background-color: #DC2285"></span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="sms_a_swatches_preview rounded-4 mt-2 "
                                style="background-color: #EAEAEA; padding: 20px;">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label fs-2 "  data-i18n="popoups.future_managment.add_new_feature.add_new_term_feature.card_selection.h3">Rounded edges</label>
                                    <div class="col-auto ms-auto">
                                        <label class="form-colorinput form-colorinput-light">
                                            <input name="color-rounded" type="checkbox" value="white"
                                                class="form-colorinput-input" name="gender" id="checkbox4"
                                                onclick="fun_checkbox4()">
                                            <span class="form-colorinput-color bg-white rounded-circle"></span>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <div class="row g-2 mb-2">
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-2 text-dark"><img
                                                        src="https://picsum.photos/50/50?random=1"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color-rounded" class="form-colorinput-input" checked="">
                                                <span class="form-colorinput-color rounded-2 text-dark text-center"><img
                                                        src="https://picsum.photos/50/50?random=2"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-2 text-dark"><img
                                                        src="https://picsum.photos/50/50?random=3"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-2 text-dark"><img
                                                        src="https://picsum.photos/50/50?random=4"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="sms_a_swatches_preview rounded-4 mt-2 "
                                style="background-color: #EAEAEA; padding: 20px;">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label fs-2 "  data-i18n="popoups.future_managment.add_new_feature.add_new_term_feature.card_selection.h4">Radio buttons</label>
                                    <div class="col-auto ms-auto">
                                        <label class="form-colorinput form-colorinput-light">
                                            <input name="color-rounded" type="checkbox" value="white"
                                                class="form-colorinput-input" name="gender" id="checkbox5"
                                                onclick="fun_checkbox5()">
                                            <span class="form-colorinput-color bg-white rounded-circle"></span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="row g-2 mb-2">
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-circle text-dark"><img
                                                        src="xhttps://picsum.photos/50/50?random=1"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color-rounded" class="form-colorinput-input" checked="">
                                                <span
                                                    class="form-colorinput-color rounded-circle text-dark text-center"><img
                                                        src="https://picsum.photos/50/50?random=2"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-circle text-dark"><img
                                                        src="https://picsum.photos/50/50?random=3"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput">
                                                <input name="color-rounded" class="form-colorinput-input">
                                                <span class="form-colorinput-color rounded-circle text-dark"><img
                                                        src="https://picsum.photos/50/50?random=4"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-2 p-2  ">
                            <button type="button" class="btn btn-primary col-12 col-md-12 rounded-4 py-3"
                                onclick="submit_add_feature_Data()" id="feature_disbale" data-i18n="popoups.future_managment.add_new_feature.add_new_term_feature.last_btn_feature">To add the
                                feature click here +</button>
                        </div>
                    </form>
                    <div class="modal-body text-center py-4 sms_manage_feature_pop " id="sms_feature_success_message"
                        style="display: none;">
                        <!-- Close icon -->

                        <button type="button" class="btn-close" aria-label="Close"
                            onclick="sms_add_featrue_close_success_message()"></button>
                        <!-- SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                        </svg>
                        <h3>Success</h3>
                        <div class="text-muted">Your coupon data has been submitted successfully.</div>
                    </div>
                    <div class="modal-body text-center py-4 sms_manage_feature_pop " id="sms_feature_error_message"
                        style="display: none;">
                        <!-- Close icon -->
                        <button type="button" class="btn-close" aria-label="Close"
                            onclick="sms_add_feature_close_error_message()"></button>
                        <!-- SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-red icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="12" y1="5" x2="12.01" y2="19"></line>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="12" y1="5" x2="12.01" y2="19"></line>
                        </svg>
                        <h3>Error</h3>
                        <div class="text-muted">An error occurred while submitting data. Please try again later.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>



<script>

    function submit_add_feature_Data() {
        const name = document.getElementById('sms_attribute_name').value;
        const type = document.getElementById('sms_attribute_select').value;

        console.log("Attribute Name:", name);
        console.log("Display Type:", type);

        let jsonData = {
            name: name,
            type: type,
            swatches: [],
            dynamicTermNames: [],
            dynamicTermImages: []
        };

        // For each swatch preview section
        document.querySelectorAll('.sms_a_swatches_preview').forEach((swatch) => {
            const checkbox = swatch.querySelector('.form-colorinput-input');

            if (checkbox.checked) {
                const title = swatch.querySelector('.form-check-label').textContent.trim();
                const options = [{
                    name: checkbox.name,
                    checked: checkbox.checked
                }];

                console.log("Title:", title);
                console.log("Options:", options);

                jsonData.swatches.push({ title: title, options: options });
            }
        });

        let dynamicTermNames = document.querySelectorAll('[id^="sms_name_of_attribute"]');
        let dynamicTermImages = document.querySelectorAll('[id^="sms_image_input"]');

        // Collect dynamically added input values
        dynamicTermNames.forEach((input, index) => {
            jsonData.dynamicTermNames.push(input.value);
            console.log("Dynamic Term Name " + (index + 1) + ":", input.value);
        });

        dynamicTermImages.forEach((input, index) => {
            jsonData.dynamicTermImages.push(input.files[0]);
            console.log("Dynamic Term Image " + (index + 1) + ":", input.files[0]);
        });

        // Send JSON data with fetch API
        fetch('/attributes/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
                // Add any additional headers if required, such as authorization token
            },
            body: JSON.stringify(jsonData)
        })
            .then(response => {
                if (response.ok) {
                    // Form submission succeeded, display success message
                    document.getElementById('sms_feature_success_message').style.display = 'block';
                    document.getElementById('sms_feature_error_message').style.display = 'none';
                    document.getElementById("feature_disbale").disabled = true;

                    window.location.reload();
                } else {
                    // Form submission failed, display error message
                    document.getElementById('sms_feature_error_message').style.display = 'block';
                    document.getElementById('sms_feature_success_message').style.display = 'none'; 
                    document.getElementById("feature_disbale").disabled = false;
            
                }
            })
            .catch(error => {
                // Network error occurred, display error message
                document.getElementById('sms_feature_error_message').style.display = 'block';
                console.error('Error submitting form data:', error);
            });
    }

    function sms_add_featrue_close_success_message() {
            document.getElementById('sms_feature_success_message').style.display = 'none';
        }

        function sms_add_feature_close_error_message() {
            document.getElementById('sms_feature_error_message').style.display = 'none';
        }


    var inputCount = 0;

    // Function to add input fields
    function sms_a_add_features() {
        inputCount++;
        var container = document.getElementById('sms_a_add_feature');
        var newInput = document.createElement('div');
        var uniqueId = 'sms_image_input' + inputCount; // Generate unique ID
        newInput.classList.add('col-md-12', 'mb-3', 'p-2');
        newInput.innerHTML = `
    <div class='gx-3'>
        <label for="${uniqueId}" class="form-label">Name of the term</label>
        <div> 
            <input type="text" class="form-control text-dark rounded-3 p-3 fw-bold" id="sms_name_of_attribute"  placeholder="Name Of Term">
        </div>
        <div>
            <label class="form-label mt-4" >Selecting an image to display the term</label>
            <div class="sms_a_custom_file_input" id="imageInputContainer">
                <input type="file" id="${uniqueId}" accept="image/*" onchange="showFileName(this)">
                <label for="${uniqueId}">
                    <i class="bi bi-image text-black"></i>
                    <svg width="20" height="20" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z" fill="black" />
                    </svg>
                   <p >Selecting an image</p>
                </label>
            </div>
        </div>
    </div>
    `;
        container.appendChild(newInput);
    }

    // Function to display file name
    function showFileName(input) {
        var label = input.nextElementSibling;
        var fileName = input.files[0].name;
        label.innerHTML = '<i class="bi bi-image text-black"></i> ' + fileName;
    }



    // Add one input field when the page loads
    window.onload = function () {
        sms_a_add_features();
    };

    //  this is for color change
    var selectColor = document.getElementById('selectColor');
    var colorDisplay = document.getElementById('colorDisplay');

    selectColor.addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var colorValue = selectedOption.getAttribute('data-color');
        colorDisplay.style.backgroundColor = colorValue;
    });



    function fun_checkbox1() {
        var checkbox = document.getElementById('checkbox1').checked;
        var checkbox1 = document.getElementById('checkbox2').checked;
        var checkbox2 = document.getElementById('checkbox3').checked;
        var checkbox4 = document.getElementById('checkbox4').checked;
        var checkbox5 = document.getElementById('checkbox5').checked;
        if (checkbox.checked === true) {
            document.getElementById('checkbox1').checked = false;
        } else {
            document.getElementById('checkbox2').checked = false;
            document.getElementById('checkbox5').checked = false;
            document.getElementById('checkbox3').checked = false;
            document.getElementById('checkbox4').checked = false;
        }
    }
    function fun_checkbox2() {
        var checkbox = document.getElementById('checkbox1').checked;
        var checkbox1 = document.getElementById('checkbox2').checked;
        var checkbox2 = document.getElementById('checkbox3').checked;
        var checkbox4 = document.getElementById('checkbox4').checked;
        var checkbox5 = document.getElementById('checkbox5').checked;
        if (checkbox.checked === true) {
            document.getElementById('checkbox1').checked = false;
        } else {
            document.getElementById('checkbox1').checked = false;
            document.getElementById('checkbox5').checked = false;
            document.getElementById('checkbox3').checked = false;
            document.getElementById('checkbox4').checked = false;
        }
    }
    function fun_checkbox3() {
        var checkbox = document.getElementById('checkbox1').checked;
        var checkbox1 = document.getElementById('checkbox2').checked;
        var checkbox2 = document.getElementById('checkbox3').checked;
        var checkbox4 = document.getElementById('checkbox4').checked;
        var checkbox5 = document.getElementById('checkbox5').checked;
        if (checkbox.checked === true) {
            document.getElementById('checkbox1').checked = false;
        } else {
            document.getElementById('checkbox1').checked = false;
            document.getElementById('checkbox5').checked = false;
            document.getElementById('checkbox2').checked = false;
            document.getElementById('checkbox4').checked = false;
        }
    }
    function fun_checkbox4() {
        var checkbox = document.getElementById('checkbox1').checked;
        var checkbox1 = document.getElementById('checkbox2').checked;
        var checkbox2 = document.getElementById('checkbox3').checked;
        var checkbox4 = document.getElementById('checkbox4').checked;
        var checkbox5 = document.getElementById('checkbox5').checked;
        if (checkbox.checked === true) {
            document.getElementById('checkbox1').checked = false;
        } else {
            document.getElementById('checkbox1').checked = false;
            document.getElementById('checkbox5').checked = false;
            document.getElementById('checkbox3').checked = false;
            document.getElementById('checkbox2').checked = false;
        }
    }
    function fun_checkbox5() {
        var checkbox = document.getElementById('checkbox1').checked;
        var checkbox1 = document.getElementById('checkbox2').checked;
        var checkbox2 = document.getElementById('checkbox3').checked;
        var checkbox4 = document.getElementById('checkbox4').checked;
        var checkbox5 = document.getElementById('checkbox5').checked;
        if (checkbox.checked === true) {
            document.getElementById('checkbox1').checked = false;
        } else {
            document.getElementById('checkbox1').checked = false;
            document.getElementById('checkbox2').checked = false;
            document.getElementById('checkbox3').checked = false;
            document.getElementById('checkbox4').checked = false;
        }
    }
</script>

</div>

