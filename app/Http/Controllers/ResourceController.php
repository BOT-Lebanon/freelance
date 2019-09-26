<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Repositories\ResourceRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Resource;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ResourceController extends InfyOmBaseController
{
    /** @var  ResourceRepository */
    private $resourceRepository;

    public function __construct(ResourceRepository $resourceRepo)
    {
        $this->resourceRepository = $resourceRepo;
    }

    /**
     * Display a listing of the Resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->resourceRepository->pushCriteria(new RequestCriteria($request));
        $resources = $this->resourceRepository->all();

        return view('admin.resources.index')
            ->with('resources', $resources);
    }

    /**
     * Show the form for creating a new Resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created Resource in storage.
     *
     * @param CreateResourceRequest $request
     *
     * @return Response
     */
    public function store(CreateResourceRequest $request)
    {
        $input = $request->all();

        $resource = $this->resourceRepository->create($input);

        Flash::success('Resource saved successfully.');

        return redirect(route('admin.resources.index'));
    }

    /**
     * Display the specified Resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resource = $this->resourceRepository->findWithoutFail($id);

        if (empty($resource)) {
            Flash::error('Resource not found');

            return redirect(route('resources.index'));
        }

        return view('admin.resources.show')->with('resource', $resource);
    }

    /**
     * Show the form for editing the specified Resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $resource = $this->resourceRepository->findWithoutFail($id);

        if (empty($resource)) {
            Flash::error('Resource not found');

            return redirect(route('resources.index'));
        }

        return view('admin.resources.edit')->with('resource', $resource);
    }

    /**
     * Update the specified Resource in storage.
     *
     * @param  int              $id
     * @param UpdateResourceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResourceRequest $request)
    {
        $resource = $this->resourceRepository->findWithoutFail($id);

        

        if (empty($resource)) {
            Flash::error('Resource not found');

            return redirect(route('resources.index'));
        }

        $resource = $this->resourceRepository->update($request->all(), $id);

        Flash::success('Resource updated successfully.');

        return redirect(route('admin.resources.index'));
    }

    /**
     * Remove the specified Resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.resources.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Resource::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.resources.index'))->with('success', Lang::get('message.success.delete'));

       }
}
