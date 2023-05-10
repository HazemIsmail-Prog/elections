<?php

namespace App\Imports;

use App\Models\Provider;
use App\Models\School;
use App\Models\Section;
use App\Models\Voter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VotersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // dd($row);
        return new Voter(
            [
                'name'     => $row['alasm'],
                'address'    => $row['alaanoan'],
                'letter'    => 'a',
                'gender'    => 1,
                'provider_id' => $this->getProviderId($row['aldamn']),
                'section_id' => $this->getSectionId($row['almdrsh'], $row['allgnh']),
            ]
        );
    }

    public function getProviderId($provider_name)
    {
        $provider = Provider::where('name', $provider_name)->first();
        if ($provider) {
            return $provider->id;
        } else {
            $provider = Provider::create([
                'name' => $provider_name,
                'phone' => '00000000',
            ]);
            return $provider->id;
        }
    }

    public function getSectionId($school_name, $section_name)
    {
        $school = School::where('name', $school_name)->first();
        if ($school) {
            $section = Section::where('school_id', $school->id)->where('name', 'لجنة ' . $section_name)->first();
            return $section->id;
        } else {
            $school = School::create(['name' => $school_name]);

            //Observer will create sections

            $section = Section::where('school_id', $school->id)->where('name', 'لجنة ' . $section_name)->first();
            return $section->id;
        }
    }
}
