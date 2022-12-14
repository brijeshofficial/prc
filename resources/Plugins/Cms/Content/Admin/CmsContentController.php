<?php
#app$this->plugin->pathPlugin.//Admin/CmsContentController.php
namespace App\Plugins\Cms\Content\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopLanguage;
use App\Plugins\Cms\Content\Models\CmsCategory;
use App\Plugins\Cms\Content\Models\CmsContent;
use App\Plugins\Cms\Content\Models\CmsContentDescription;
use App\Plugins\Cms\Content\AppConfig;
use Validator;

class CmsContentController extends Controller
{
    public $languages;
    public $plugin;

    public function __construct()
    {
        $this->languages = ShopLanguage::getList();
        $this->plugin = new AppConfig;

    }

    public function index()
    {
        $data = [
            'title' => trans($this->plugin->pathPlugin.'::Content.admin.list'),
            'subTitle' => '',
            'icon' => 'fa fa-indent',
            'menuRight' => [],
            'menuLeft' => [],
            'topMenuRight' => [],
            'topMenuLeft' => [],
            'urlDeleteItem' => route('admin_cms_content.delete'),
            'removeList' => 1, // 1 - Enable function delete list item
            'buttonRefresh' => 1, // 1 - Enable button refresh
            'buttonSort' => 1, // 1 - Enable button sort
            'buttonFilter' => 0, // 1 - Enable button filter
            'css' => '', 
            'js' => '',
        ];

        $listTh = [
            'id' => trans($this->plugin->pathPlugin.'::Content.id'),
            'image' => trans($this->plugin->pathPlugin.'::Content.image'),
            'title' => trans($this->plugin->pathPlugin.'::Content.title'),
            'category_id' => trans($this->plugin->pathPlugin.'::Content.category_id'),
            'status' => trans($this->plugin->pathPlugin.'::Content.status'),
            'sort' => trans($this->plugin->pathPlugin.'::Content.sort'),
            'action' => trans($this->plugin->pathPlugin.'::Content.admin.action'),
        ];
        $sort_order = request('sort_order') ?? 'id_desc';
        $keyword = request('keyword') ?? '';
        $arrSort = [
            'id__desc' => trans($this->plugin->pathPlugin.'::Content.admin.sort_order.id_desc'),
            'id__asc' => trans($this->plugin->pathPlugin.'::Content.admin.sort_order.id_asc'),
            'title__desc' => trans($this->plugin->pathPlugin.'::Content.admin.sort_order.title_desc'),
            'title__asc' => trans($this->plugin->pathPlugin.'::Content.admin.sort_order.title_asc'),
        ];
        $obj = new CmsContent;

        $obj = $obj
            ->leftJoin(SC_DB_PREFIX.'cms_content_description', SC_DB_PREFIX.'cms_content_description.cms_content_id', SC_DB_PREFIX.'cms_content.id')
            ->where(SC_DB_PREFIX.'cms_content_description.lang', sc_get_locale());
        if ($keyword) {
            $obj = $obj->whereRaw('(id = ' . (int) $keyword . ' OR '.SC_DB_PREFIX.'cms_content_description.title like "%' . $keyword . '%" )');
        }
        if ($sort_order && array_key_exists($sort_order, $arrSort)) {
            $field = explode('__', $sort_order)[0];
            $sort_field = explode('__', $sort_order)[1];
            $obj = $obj->orderBy($field, $sort_field);

        } else {
            $obj = $obj->orderBy('id', 'desc');
        }
        $dataTmp = $obj->paginate(20);

        $dataTr = [];
        foreach ($dataTmp as $key => $row) {
            $dataTr[] = [
                'id' => $row['id'],
                'image' => sc_image_render($row->getThumb(), '50px', '50px', $row['title']),
                'title' => $row['title'],
                'category_id' => $row['category_id'] ? ($row->category ? $row->category['title'] : '') : 'ROOT',

                'status' => $row['status'] ? '<span class="label label-success">ON</span>' : '<span class="label label-danger">OFF</span>',
                'sort' => $row['sort'],
                'action' => '
                    <a href="' . route('admin_cms_content.edit', ['id' => $row['id']]) . '"><span title="' . trans($this->plugin->pathPlugin.'::Content.admin.edit') . '" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>&nbsp;

                    <span onclick="deleteItem(' . $row['id'] . ');"  title="' . trans('admin.delete') . '" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>'
                ,
            ];
        }

        $data['listTh'] = $listTh;
        $data['dataTr'] = $dataTr;
        $data['pagination'] = $dataTmp
            ->appends(request()->except(['_token', '_pjax']))
            ->links('admin.component.pagination');
        $data['resultItems'] = trans($this->plugin->pathPlugin.'::Content.admin.result_item', 
            [
                'item_from' => $dataTmp->firstItem(), 
                'item_to' => $dataTmp->lastItem(), 
                'item_total' => $dataTmp->total()
            ]
        );

        //menuRight
        $data['menuRight'][] = '<a href="' . route('admin_cms_content.create') . '" class="btn  btn-success  btn-flat" title="New" id="button_create_new">
                           <i class="fa fa-plus"></i><span class="hidden-xs">' . trans('admin.add_new') . '</span>
                           </a>';
        //=menuRight

        //menu_sort
        $optionSort = '';
        foreach ($arrSort as $key => $status) {
            $optionSort .= '<option  ' . (($sort_order == $key) ? "selected" : "") . ' value="' . $key . '">' . $status . '</option>';
        }

        $data['urlSort'] = route('admin_cms_content.index');
        $data['optionSort'] = $optionSort;
        //=menu_sort

        //menuSearch
        $data['topMenuRight'][] = '
                <form action="' . route('admin_cms_content.index') . '" id="button_search">
                   <div onclick="$(this).submit();" class="btn-group pull-right">
                           <a class="btn btn-flat btn-primary" title="Refresh">
                              <i class="fa  fa-search"></i><span class="hidden-xs"> ' . trans('admin.search') . '</span>
                           </a>
                   </div>
                   <div class="btn-group pull-right">
                         <div class="form-group">
                           <input type="text" name="keyword" class="form-control" placeholder="' . trans($this->plugin->pathPlugin.'::Content.admin.search_place') . '" value="' . $keyword . '">
                         </div>
                   </div>
                </form>';
        //=menuSearch

        return view('admin.screen.list')
            ->with($data);
    }

    /**
     * Form create new order in admin
     * @return [type] [description]
     */
    public function create()
    {
        $data = [
            'title' => trans($this->plugin->pathPlugin.'::Content.admin.add_new_title'),
            'subTitle' => '',
            'title_description' => trans($this->plugin->pathPlugin.'::Content.admin.add_new_des'),
            'icon' => 'fa fa-plus',
            'languages' => $this->languages,
            'content' => [],
            'categories' => (new CmsCategory)->getTreeCategories(),
            'url_action' => route('admin_cms_content.create'),

        ];
        return view($this->plugin->pathPlugin.'::Admin.cms_content')
            ->with($data);
    }

    /**
     * Post create new order in admin
     * @return [type] [description]
     */
    public function postCreate()
    {
        $data = request()->all();
        $langFirst = array_key_first(sc_language_all()->toArray()); //get first code language active
        $data['alias'] = !empty($data['alias'])?$data['alias']:$data['descriptions'][$langFirst]['title'];
        $data['alias'] = sc_word_format_url($data['alias']);
        $data['alias'] = sc_word_limit($data['alias'], 100);
        $validator = Validator::make($data, [
            'sort' => 'numeric|min:0',
            'category_id' => 'required',
            'descriptions.*.title' => 'required|string|max:200',
            'descriptions.*.keyword' => 'nullable|string|max:200',
            'descriptions.*.description' => 'nullable|string|max:300',
            'alias' => 'required|regex:/(^([0-9A-Za-z\-_]+)$)/|unique:'.SC_DB_PREFIX.'cms_content,alias|string|max:100',
        ], [
            'descriptions.*.title.required' => trans('validation.required', 
            ['attribute' => trans($this->plugin->pathPlugin.'::Content.title')]),
            'alias.regex' => trans($this->plugin->pathPlugin.'::Content.alias_validate'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }

        $dataInsert = [
            'image' => $data['image'],
            'alias' => $data['alias'],
            'category_id' => (int) $data['category_id'],
            'status' => !empty($data['status']) ? 1 : 0,
            'sort' => (int) $data['sort'],
        ];
        $content = CmsContent::create($dataInsert);
        $id = $content->id;
        $dataDes = [];
        $languages = $this->languages;
        foreach ($languages as $code => $value) {
            $dataDes[] = [
                'cms_content_id' => $id,
                'lang' => $code,
                'title' => $data['descriptions'][$code]['title'],
                'keyword' => $data['descriptions'][$code]['keyword'],
                'description' => $data['descriptions'][$code]['description'],
                'content' => $data['descriptions'][$code]['content'],
            ];
        }
        CmsContentDescription::insert($dataDes);

        return redirect()->route('admin_cms_content.index')
        ->with('success', trans($this->plugin->pathPlugin.'::Content.admin.create_success'));

    }

/**
 * Form edit
 */
    public function edit($id)
    {
        $content = CmsContent::find($id);
        if ($content === null) {
            return 'no data';
        }
        $data = [
            'title' => trans($this->plugin->pathPlugin.'::Content.admin.edit'),
            'subTitle' => '',
            'title_description' => '',
            'icon' => 'fa fa-pencil-square-o',
            'languages' => $this->languages,
            'content' => $content,
            'categories' => (new CmsCategory)->getTreeCategories(),
            'url_action' => route('admin_cms_content.edit', ['id' => $content['id']]),
        ];
        return view($this->plugin->pathPlugin.'::Admin.cms_content')
            ->with($data);
    }

/**
 * update status
 */
    public function postEdit($id)
    {
        $content = CmsContent::find($id);
        $data = request()->all();
        
        $langFirst = array_key_first(sc_language_all()->toArray()); //get first code language active
        $data['alias'] = !empty($data['alias'])?$data['alias']:$data['descriptions'][$langFirst]['title'];
        $data['alias'] = sc_word_format_url($data['alias']);
        $data['alias'] = sc_word_limit($data['alias'], 100);

        $validator = Validator::make($data, [
            'category_id' => 'required',
            'alias' => 'required|regex:/(^([0-9A-Za-z\-_]+)$)/|unique:'.SC_DB_PREFIX.'cms_content,alias,' . $content->id . ',id|string|max:100',
            'sort' => 'numeric|min:0',
            'descriptions.*.title' => 'required|string|max:200',
            'descriptions.*.keyword' => 'nullable|string|max:200',
            'descriptions.*.description' => 'nullable|string|max:300',
        ], [
            'alias.regex' => trans($this->plugin->pathPlugin.'::Content.alias_validate'),
            'descriptions.*.title.required' => trans('validation.required', ['attribute' => trans($this->plugin->pathPlugin.'::Content.title')]),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }
//Edit

        $dataUpdate = [
            'image' => $data['image'],
            'alias' => $data['alias'],
            'category_id' => $data['category_id'],
            'sort' => $data['sort'],
            'status' => empty($data['status']) ? 0 : 1,
        ];

        $content = CmsContent::find($id);
        $content->update($dataUpdate);
        $content->descriptions()->delete();
        $dataDes = [];
        foreach ($data['descriptions'] as $code => $row) {
            $dataDes[] = [
                'cms_content_id' => $id,
                'lang' => $code,
                'title' => $row['title'],
                'keyword' => $row['keyword'],
                'description' => $row['description'],
                'content' => $row['content'],
            ];
        }
        CmsContentDescription::insert($dataDes);

//
        return redirect()->route('admin_cms_content.index')->with('success', trans($this->plugin->pathPlugin.'::Content.admin.edit_success'));

    }

/*
Delete list Item
Need mothod destroy to boot deleting in model
 */
    public function deleteList()
    {
        if (!request()->ajax()) {
            return response()->json(['error' => 1, 'msg' => 'Method not allow!']);
        } else {
            $ids = request('ids');
            $arrID = explode(',', $ids);
            CmsContent::destroy($arrID);
            return response()->json(['error' => 0, 'msg' => '']);
        }
    }

}
