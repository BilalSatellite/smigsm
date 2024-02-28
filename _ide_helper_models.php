<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Ic{
/**
 * App\Models\Ic\AttributeIc
 *
 * @property int $id
 * @property string $name
 * @property array $values
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeIc whereValues($value)
 */
	class AttributeIc extends \Eloquent {}
}

namespace App\Models\Ic{
/**
 * App\Models\Ic\BrandIc
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $desc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc query()
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandIc whereUpdatedAt($value)
 */
	class BrandIc extends \Eloquent {}
}

namespace App\Models\Ic{
/**
 * App\Models\Ic\CategorieIc
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $desc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieIc whereUpdatedAt($value)
 */
	class CategorieIc extends \Eloquent {}
}

namespace App\Models\Ic{
/**
 * App\Models\Ic\SubCategorieIc
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $desc
 * @property int $categorie_ic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc whereCategorieIcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategorieIc whereUpdatedAt($value)
 */
	class SubCategorieIc extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutRole($roles, $guard = null)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutPermission($permissions)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $profile_photo_path
 * @property string|null $banned_time
 * @property string $banned_status
 * @property int $wrong_attempt
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBannedStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBannedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWrongAttempt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}
