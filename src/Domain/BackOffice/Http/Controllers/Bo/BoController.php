<?php

namespace MbcApiContent\Domain\BackOffice\Http\Controllers\Bo;

use App\Http\Controllers\Controller;

class BoController  extends Controller
{
    public function index()
    {
        return view('api_content_views::backoffice.index');;
    }

//
//    public function editorExample()
//    {
//
//        return view('api_content_views::backoffice.editor_example');
//    }

    public function wysiwyg()
    {


        return view('api_content_views::backoffice.wysiwyg');
    }
//
//
//
//
//    //--------------------
//    //--------------------
//    //--------------------
//    //--------------------
//
//    public function wysiwygInline()
//    {
//
//        return view('api_content_views::backoffice.wysiwyg_inline');
//    }
//
//
//
//    public function wysiwygInlineEdit()
//    {
//
//        return view('api_content_views::backoffice.wysiwyg_inline');
//    }
//
//
//
//    public function wysiwygEdit()
//    {
//
//        return view('api_content_views::backoffice.wysiwyg');
//    }
}
