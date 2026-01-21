<?php

namespace App\Services;

use App\Repositories\ClassRepository;
use App\Repositories\SprintRepository;
use App\Repositories\BriefRepository;
use App\Repositories\CompetenceRepository;

class StructureService
{
    private $classRepo;
    private $sprintRepo;
    private $briefRepo;
    private $competenceRepo;

    public function __construct()
    {
        $this->classRepo = new ClassRepository();
        $this->sprintRepo = new SprintRepository();
        $this->briefRepo = new BriefRepository();
        $this->competenceRepo = new CompetenceRepository();
    }
    
    public function getAllCompetences()
    {
        return $this->competenceRepo->all();
    }

    public function getAllClasses()
    {
        return $this->classRepo->all();
    }

    public function createClass($name)
    {
        return $this->classRepo->create(['name' => $name]);
    }

    public function getClass($id)
    {
        return $this->classRepo->find($id);
    }

    public function updateClass($id, $name)
    {
        return $this->classRepo->update($id, ['name' => $name]);
    }

    public function getSprintsForClass($classId)
    {
        return $this->sprintRepo->getByClass($classId);
    }

    public function createSprint($data)
    {
        return $this->sprintRepo->create($data);
    }

    public function getSprint($id)
    {
        return $this->sprintRepo->find($id);
    }

    public function getSprintClasses($sprintId) {
        return $this->sprintRepo->getClassesForSprint($sprintId);
    }

    public function getSprintCompetences($sprintId) {
        return $this->sprintRepo->getCompetencesForSprint($sprintId);
    }

    public function updateSprint($id, $data)
    {
        return $this->sprintRepo->update($id, $data);
    }
    
    public function getBriefsForSprint($sprintId)
    {
        return $this->briefRepo->getBySprint($sprintId);
    }

    public function createCompetence($data)
    {
        return $this->competenceRepo->create($data);
    }

    public function getCompetence($id)
    {
        return $this->competenceRepo->find($id);
    }

    public function updateCompetence($id, $data)
    {
        return $this->competenceRepo->update($id, $data);
    }
    
    public function getBrief($id)
    {
        return $this->briefRepo->find($id);
    }
}
