<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAlloweduserRequest;
use App\Http\Requests\UpdateAlloweduserRequest;
use App\Repositories\AlloweduserRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Alloweduser;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AlloweduserController extends InfyOmBaseController
{
    /** @var  AlloweduserRepository */
    private $alloweduserRepository;

    public function __construct(AlloweduserRepository $alloweduserRepo)
    {
        $this->alloweduserRepository = $alloweduserRepo;
    }

    /**
     * Display a listing of the Alloweduser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->alloweduserRepository->pushCriteria(new RequestCriteria($request));
        $allowedusers = $this->alloweduserRepository->all();

        return view('admin.allowedusers.index')
            ->with('allowedusers', $allowedusers);
    }

    /**
     * Show the form for creating a new Alloweduser.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.allowedusers.create');
    }

    /**
     * Store a newly created Alloweduser in storage.
     *
     * @param CreateAlloweduserRequest $request
     *
     * @return Response
     */
    public function store(CreateAlloweduserRequest $request)
    {
        $input = $request->all();

        $alloweduser = $this->alloweduserRepository->create($input);

        Flash::success('Alloweduser saved successfully.');

        return redirect(route('admin.allowedusers.index'));
    }

    /**
     * Display the specified Alloweduser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alloweduser = $this->alloweduserRepository->findWithoutFail($id);

        if (empty($alloweduser)) {
            Flash::error('Alloweduser not found');

            return redirect(route('allowedusers.index'));
        }

        return view('admin.allowedusers.show')->with('alloweduser', $alloweduser);
    }

    /**
     * Show the form for editing the specified Alloweduser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alloweduser = $this->alloweduserRepository->findWithoutFail($id);

        if (empty($alloweduser)) {
            Flash::error('Alloweduser not found');

            return redirect(route('allowedusers.index'));
        }

        return view('admin.allowedusers.edit')->with('alloweduser', $alloweduser);
    }

    /**
     * Update the specified Alloweduser in storage.
     *
     * @param  int              $id
     * @param UpdateAlloweduserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlloweduserRequest $request)
    {
        $alloweduser = $this->alloweduserRepository->findWithoutFail($id);

        

        if (empty($alloweduser)) {
            Flash::error('Alloweduser not found');

            return redirect(route('allowedusers.index'));
        }

        $alloweduser = $this->alloweduserRepository->update($request->all(), $id);

        Flash::success('Alloweduser updated successfully.');

        return redirect(route('admin.allowedusers.index'));
    }

    /**
     * Remove the specified Alloweduser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.allowedusers.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Alloweduser::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.allowedusers.index'))->with('success', Lang::get('message.success.delete'));

       }
}
