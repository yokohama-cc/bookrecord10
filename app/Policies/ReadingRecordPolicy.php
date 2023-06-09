<?php

namespace App\Policies;

use App\Models\ReadingRecord;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReadingRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReadingRecord $readingRecord): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReadingRecord $readingRecord): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReadingRecord $readingRecord): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ReadingRecord $readingRecord): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ReadingRecord $readingRecord): bool
    {
        //
    }

    public function update_and_delete(User $user, ReadingRecord $reading_record)
    {
        return ($user->reader->id == $reading_record->reader_id);    
    }
}
