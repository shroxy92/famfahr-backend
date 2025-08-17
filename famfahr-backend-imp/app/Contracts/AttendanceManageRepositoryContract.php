<?php

namespace App\Contracts;

use App\Http\Requests\StoreAttendanceRequest;

interface AttendanceManageRepositoryContract
{
    public function attendance_store(array $data);
    public function attendance_update($id, StoreAttendanceRequest $request);
    public function attendance_delete($id);
    public function attendance_show($id);
    public function attendance_show_all(array $data);


}
