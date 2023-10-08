<?php

namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class AttendanceRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $existingDependents = data_get($attributes, 'existing_dependents') ?? [];
            $newDependents = data_get($attributes, 'new_dependents') ?? [];

            $mergedDependents = array_merge($existingDependents, $newDependents);

            $processedDependentsArray = [];
            foreach ($mergedDependents as $dependent) {
                $dependent['allergies'] = explode(',', $dependent['allergies']);
                $processedDependentsArray[] = $dependent;
            }
            // return $processedDependentsArray;

            $created = Attendance::query()->create([
                'event_id'               => data_get($attributes, 'event_id', 'Untitled'),
                'user_id'                => data_get($attributes, 'user_id'),
                'in_person'              => data_get($attributes, 'in_person'),
                'requires_feeding'       => data_get($attributes, 'requires_feeding'),
                'requires_accommodation' => data_get($attributes, 'requires_accommodation'),
                'requires_transport'     => data_get($attributes, 'requires_transport'),
                'services_required'      => data_get($attributes, 'services_required'),
                'dates_attending'        => data_get($attributes, 'dates_attending'),
                'children'               => $processedDependentsArray,
                'registration_date'      => now(),
            ]);

            throw_if(!$created, GeneralJsonException::class, 'Failed to create. ');
            // event(new AttendanceCreated($created));

            return $created;
        });
    }

    /**
     * @param Attendance $post
     * @param array $attributes
     * @return mixed
     */
    public function update($post, array $attributes)
    {
        return DB::transaction(function () use ($post, $attributes) {
            $updated = $post->update([
                'name' => data_get($attributes, 'name', 'Untitled'),
                'description' => data_get($attributes, 'description'),
                'price' => data_get($attributes, 'price', 0),
                'trial_days' => data_get($attributes, 'trial_days', 0),
                'max_devices' => data_get($attributes, 'max_devices'),
                'max_users' => data_get($attributes, 'max_users'),
            ]);

            throw_if(!$updated, GeneralJsonException::class, 'Failed to update post');

            //            event(new AttendanceUpdated($post));

            if ($userIds = data_get($attributes, 'user_ids')) {
                $post->users()->sync($userIds);
            }

            return $post;
        });
    }

    /**
     * @param Attendance $post
     * @return mixed
     */
    public function forceDelete($post)
    {
        return DB::transaction(function () use ($post) {
            $deleted = $post->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, "cannot delete post.");

            // event(new AttendanceDeleted($post));

            return $deleted;
        });
    }
}
