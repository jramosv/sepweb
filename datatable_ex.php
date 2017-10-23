 public function getPatientsData()
    {
        // $patients = Patient::select([
        //     'id',
        //     'first_name',
        //     'last_name',
        //     'address',
        //     'phone',
        //     'date_birth',
        //     'sex',
        //     'email',
        // ])->with(['tiposangre' => function($query) {
        //     $query->select('type');
        // }])->get();

        // $patients = Patient::select([
        //     'id',
        //     'first_name',
        //     'last_name',
        //     'address',
        //     'phone',
        //     'date_birth',
        //     'sex',
        //     'email',
        //     'blood_types_id',
        // ]);

        $patients = DB::table('patients')
           ->join('blood_types', 'patients.blood_types_id', '=', 'blood_types.id')
           ->select('patients.id', 
            'patients.first_name',
            'patients.last_name',
            'patients.address',
            'patients.phone',
            'patients.date_birth',
            'patients.sex',
            'patients.email',
            'blood_types.type'
        )->get();
        return datatables($patients)->toJson();

        //return Datatables::of($patients)->make();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_sangre = BloodType::all();
        return view('patients.create', compact('tipos_sangre'));
    }
