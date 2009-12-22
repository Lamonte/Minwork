<?php

//Route::Mask("pages/custom-(:num)-(:num).html", "test/main/$1/$2");
Route::Mask("contact.html", "welcome/contact");

//Don't remote
Route::instance()->start_remapping();