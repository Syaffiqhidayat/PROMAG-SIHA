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


namespace App\Models{
/**
 * @property int $id
 * @property string $kd_barang
 * @property string $no_iventaris
 * @property string $nama_barang
 * @property string $jenis_barang
 * @property string $merek
 * @property string $tipe
 * @property string $spek
 * @property string|null $keterangan
 * @property int $unit_id
 * @property string $tanggal_masuk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Hardware> $kerusakans
 * @property-read int|null $kerusakans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mutasi> $mutasis
 * @property-read int|null $mutasis_count
 * @property-read \App\Models\Unit $units
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereJenisBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereKdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereMerek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereNamaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereNoIventaris($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereSpek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereTanggalMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereTipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hardware whereUpdatedAt($value)
 */
	class Hardware extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $subnet1
 * @property int $subnet2
 * @property int $subnet3
 * @property int $subnet4
 * @property int|null $hardware_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hardware|null $hardwares
 * @method static \Illuminate\Database\Eloquent\Builder|Ip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereSubnet1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereSubnet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereSubnet3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereSubnet4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereUpdatedAt($value)
 */
	class Ip extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $tgl_respon
 * @property string $tgl_requst
 * @property string|null $waktu_respon
 * @property string $waktu_requst
 * @property string $laporan
 * @property string|null $tindakan
 * @property int $hardware_id
 * @property int $unit_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hardware $hardwares
 * @property-read \App\Models\Unit $units
 * @property-read \App\Models\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereLaporan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereTglRequst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereTglRespon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereTindakan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereWaktuRequst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kerusakan whereWaktuRespon($value)
 */
	class Kerusakan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property-read \App\Models\Hardware|null $hardwares
 * @property-read \App\Models\Unit|null $units
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $keterangan
 * @property int $unit_asal_id
 * @property int $unit_tujuan_id
 * @property int $hardware_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hardware $hardwares
 * @property-read \App\Models\Unit|null $units
 * @property-read \App\Models\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereUnitAsalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereUnitTujuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mutasi whereUserId($value)
 */
	class Mutasi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $kd_unit
 * @property string $nama_unit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hardware> $hardwares
 * @property-read int|null $hardwares_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hardware> $kerusakans
 * @property-read int|null $kerusakans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mutasi> $mutasis
 * @property-read int|null $mutasis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereKdUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereNamaUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 */
	class Unit extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

