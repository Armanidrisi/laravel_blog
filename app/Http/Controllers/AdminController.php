<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\StorePostRequest;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Page;
use App\Models\Category;



class AdminController extends Controller
{
  /**

  * Show the Dashboard.

  *
  * @param Request $request
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function dashboard() {
    $category = Category::count();
    $posts = Post::count();
    $comments = Comment::count();
    $users = User::count();
    $pages = Page::count();
    $lusers = User::orderBy('id', 'desc')->limit(5)->get();


    return view('admin.dashboard', [
      'category' => $category,
      'posts' => $posts,
      'comments' => $comments,
      'users' => $users,
      'pages' => $pages,
      'lusers' => $lusers
    ]);
  }
  /**
  * List the Users.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function indexUsers() {
    $users = User::orderBy('id', 'desc')->paginate(10);
    return view('admin.users.show', ['users' => $users]);
  }
  /**

  * Show the create User form.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function createUser() {
    return view('admin.users.create');
  }
  /**
  * Store the User.
  *
  * @param StoreUserRequest $request
  * @return \Illuminate\Http\RedirectResponse
  */
  public function storeUser(StoreUserRequest $request) {
    $user = new User;

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->role = $request->input('role');

    $user->save();

    return redirect()->route('admin.users')->with('success', __(':name has been created.', ['name' => $request->input('name')]));
  }
  /**
  * Show the edit User form.
  *
  * @param $id
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function editUser($id) {
    $user = User::where('id', $id)->firstOrFail();
    return view('admin.users.edit', ['user' => $user]);
  }
  /**
  * Update the User.
  *
  * @param UpdateUserRequest $request
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */

  public function updateUser(UpdateUserRequest $request, $id) {
    $user = User::where('id', $id)->firstOrFail();

    if ($request->user()->id == $user->id && $request->input('role') == 0) {
      return redirect()->route('admin.users')->with('error', __('Operation denied.'));
    }


    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $password = $request->input('password');
    if ($password) {
      $user->password = Hash::make($password);
    }
    if ($request->filled('role')) {
      $user->role = $request->input('role');
    }


    $user->save();

    return redirect()->route('admin.users')->with('success', __('Settings saved.'));
  }
  /**

  * Delete the User.

  *
  * @param Request $request
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function destroyUser(Request $request, $id) {
    $user = User::where('id', $id)->firstOrFail();

    if ($request->user()->id == $user->id && $user->role == 1) {
      return redirect()->route('admin.users', $id)->with('error', __('Operation denied.'));
    }

    $user->forceDelete();

    return redirect()->route('admin.users')->with('success', __(':name has been deleted.', ['name' => $user->name]));
  }
  /**
  * List the categories.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function indexCategories() {
    $categories = Category::orderBy('id', 'desc')->paginate(10);
    return view('admin.categories.show', ['categories' => $categories]);
  }
  /**

  * Show the create Category form.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function createCategory() {
    return view('admin.categories.create');
  }
  /**

  * Store the Category.
  *
  * @param StoreCategoryRequest $request
  * @return \Illuminate\Http\RedirectResponse
  */
  public function storeCategory(StoreCategoryRequest $request) {
    $category = new Category;

    $category->name = $request->input('name');

    $category->save();

    return redirect()->route('admin.categories')->with('success', __(':name has been created.', ['name' => $request->input('name')]));
  }
  /**
  * Show the edit Category form.
  *
  * @param $id
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function editCategory($id) {
    $category = Category::where('id', $id)->firstOrFail();
    return view('admin.categories.edit', ['category' => $category]);
  }
  /**
  * Update the Category.
  *
  * @param StoreCategoryRequest $request
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function updateCategory(StoreCategoryRequest $request, $id) {
    $category = Category::where('id', $id)->firstOrFail();

    $category->name = $request->input('name');

    $category->save();

    return redirect()->route('admin.categories')->with('success', __('Settings saved.'));
  }
  /**
  * Delete the Category.
  *
  * @param Request $request
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function destroyCategory(Request $request, $id) {
    $category = Category::where('id', $id)->firstOrFail();

    $category->forceDelete();

    return redirect()->route('admin.categories')->with('success', __(':name has been deleted.', ['name' => $category->name]));
  }
  /**
  * List the comments.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function indexComments() {
    $comments = Comment::orderBy('id', 'desc')->paginate(10);
    return view('admin.comments.show', ['comments' => $comments]);
  }
  /**
  * Delete the Comment.
  *
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function destroyComment($id) {
    $comment = Comment::where('id', $id)->firstOrFail();

    $comment->forceDelete();

    return redirect()->route('admin.comments')->with('success', __('Comment has been deleted.'));
  }
  /**
  * List the pages.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function indexPages() {
    $pages = Page::orderBy('id', 'desc')->paginate(10);
    return view('admin.pages.show', ['pages' => $pages]);
  }
  /**
  * Show the create Page form.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function createPage() {
    return view('admin.pages.create');
  }
  /**
  * Store the Page.
  *
  * @param StorePageRequest $request
  * @return \Illuminate\Http\RedirectResponse
  */
  public function storePage(StorePageRequest $request) {
    $page = new Page;

    $page->title = $request->input('title');
    $page->visibility = $request->input('visibility');
    $page->content = $request->input('content');

    if ($request->has('slug') && !empty($request->input('slug'))) {
      $page->slug = $request->input('slug');
    } else {
      $page->slug = Str::slug($request->input('title'));
    }

    $page->save();

    return redirect()->route('admin.pages')->with('success', __('Page Created Success.'));
  }
  /**
  * Show the edit Page form.
  *
  * @param $id
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function editPage($id) {
    $page = Page::where('id', $id)->firstOrFail();
    return view('admin.pages.edit', ['page' => $page]);
  }
  /**
  * Update the Page.
  *
  * @param UpdatePageRequest $request
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function updatePage(UpdatePageRequest $request, $id) {
    $page = Page::where('id', $id)->firstOrFail();

    $page->title = $request->input('title');
    $page->slug = $request->input('slug');
    $page->visibility = $request->input('visibility');
    $page->content = $request->input('content');

    $page->save();

    return redirect()->route('admin.pages')->with('success', __('Settings saved.'));
  }
  /**
  * Delete the Page.
  *
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function destroyPage($id) {
    $page = Page::where('id', $id)->firstOrFail();

    $page->forceDelete();

    return redirect()->route('admin.pages')->with('success', __(' has been deleted'));
  }
  /**
  * List the Posts.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function indexPosts() {
    $posts = Post::orderBy('id', 'desc')->paginate(10);
    return view('admin.posts.show', ['posts' => $posts]);
  }
  /**
  * Show the create Post form.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function createPost() {
    $categories = Category::orderBy('id', 'desc')->get();
    return view('admin.posts.create', ['categories' => $categories]);
  }
  /**
  * Store the Post.
  *
  * @param StorePostRequest $request
  * @return \Illuminate\Http\RedirectResponse
  */
  public function storePost(StorePostRequest $request) {
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $fileName = time() . '_' . $file->getClientOriginalName();
      $file->move(public_path('images'), $fileName);
    } else {
      $fileName = "/images/default.jpg";
    }

    $post = new Post;

    $post->title = $request->input('title');
    $post->slug = Str::slug($request->input('title'));
    $post->image = '/images/'.$fileName;
    $post->author = Auth::user()->name;
    $post->content = $request->input('content');
    $post->category_id = $request->input('category');

    $post->save();


    return redirect()->route('admin.posts')->with('success', __('Post has been deleted.'));
  }
  /**
  * Show the edit Post form.
  *
  * @param $id
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function editPost($id) {
    $post = Post::where('id', $id)->firstOrFail();
    //return $post;
    $categories = Category::orderBy('id', 'desc')->get();
    return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
  }
  /**
  * Update the Post.
  *
  * @param UpdatePostRequest $request
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function updatePost(UpdatePostRequest $request, $id) {
    $post = Post::where('id', $id)->firstOrFail();

    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->category_id = $request->input('category');

    $post->save();

    return redirect()->route('admin.posts')->with('success', __('Details saved.'));
  }
  /**
  * Delete the Post.
  *
  * @param $id
  * @return \Illuminate\Http\RedirectResponse
  */
  public function deletePost($id) {
    $post = Post::where('id', $id)->firstOrFail();

    $post->forceDelete();

    return redirect()->route('admin.posts')->with('success', __('Post delete success.'));
  }
}