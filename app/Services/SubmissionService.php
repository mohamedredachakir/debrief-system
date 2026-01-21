<?php

namespace App\Services;

use App\Repositories\SubmissionRepository;

class SubmissionService
{
    private $submissionRepo;

    public function __construct()
    {
        $this->submissionRepo = new SubmissionRepository();
    }

    public function getSubmission($briefId, $learnerId)
    {
        return $this->submissionRepo->getByBriefAndLearner($briefId, $learnerId);
    }

    public function submitWork($data)
    {
        $existing = $this->getSubmission($data['brief_id'], $data['learner_id']);
        if ($existing) {
            return $this->submissionRepo->update($existing->id, $data);
        } else {
            return $this->submissionRepo->create($data);
        }
    }
}
