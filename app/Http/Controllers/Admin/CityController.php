<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateRegionsRequest;
use App\Http\Requests\UpdateRegionsRequest;
use App\Repositories\CityRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\city;
use App\Kadaa;


use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class CityController extends InfyOmBaseController
{
    /** @var  RegionsRepository */
    private $CityRepository;

    public function __construct(CityRepository $regionsRepo)
    {
        $this->CityRepository = $regionsRepo;
    }

    /**
     * Display a listing of the Regions.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->CityRepository->pushCriteria(new RequestCriteria($request));
        $regions = $this->CityRepository->all();
		$data['regions']=$regions;
		$data['controller']=$this;
		
        return view('admin.city.index')
            ->with($data);
    }

    /**
     * Show the form for creating a new Regions.
     *
     * @return Response
     */
    public function create()
    {
		$kadaaArray = \App\Models\kadaa::all('kadaa_name', 'kadaaId');
		foreach($kadaaArray as $kad){
			$kadaa[$kad->kadaaId]=$kad->kadaa_name;
		}	
        return view('admin.regions.create',array('kadaa' => $kadaa));
    }

    /**
     * Store a newly created Regions in storage.
     *
     * @param CreateRegionsRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionsRequest $request)
    {
        $input = $request->all();

        $regions = $this->CityRepository->create($input);

        Flash::success('Regions saved successfully.');

        return redirect(route('admin.regions.index'));
    }

    /**
     * Display the specified Regions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $regions = $this->CityRepository->findWithoutFail($id);

        if (empty($regions)) {
            Flash::error('Regions not found');

            return redirect(route('regions.index'));
        }

        return view('admin.regions.show')->with('regions', $regions);
    }

    /**
     * Show the form for editing the specified Regions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $regions =Regions::findorFail($id);

        if (empty($regions)) {
            Flash::error('Regions not found');

            return redirect(route('regions.index'));
        }

		$kadaaArray = \App\Models\kadaa::all('kadaa_name', 'kadaaId');
		foreach($kadaaArray as $kad){
			$kadaa[$kad->kadaaId]=$kad->kadaa_name;
		}	
		$data['regions']=$regions;
		$data['kadaa']=$kadaa;
		
        return view('admin.regions.edit')->with($data);
    }

    /**
     * Update the specified Regions in storage.
     *
     * @param  int              $id
     * @param UpdateRegionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionsRequest $request)
    {
        $regions = $this->CityRepository->findWithoutFail($id);

        

        if (empty($regions)) {
            Flash::error('Regions not found');

            return redirect(route('regions.index'));
        }

        $regions = $this->CityRepository->update($request->all(), $id);

        Flash::success('Regions updated successfully.');

        return redirect(route('admin.regions.index'));
    }

    /**
     * Remove the specified Regions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.regions.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           if (Chuches::where('regionId', $id)->exists()) {
               // exists
               return redirect(route('admin.regions.index'))->with('error', 'Cannot be deleted');

           }
           else{
               $sample = Regions::destroy($id);
               // Redirect to the group management page
               return redirect(route('admin.regions.index'))->with('success', Lang::get('message.success.delete'));
           }

       }
	   
	   public function getKadaa($kadaaId){
		 $kadaaArray=kadaa::findorfail($kadaaId);
		 return $kadaaArray->kadaa_name;
	   } 

}
