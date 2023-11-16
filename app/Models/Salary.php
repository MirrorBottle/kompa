<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Salary extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 1;
    const STATUS_MANAGER_APPROVED = 2;
    const STATUS_FINANCE_PENDING = 3;
    const STATUS_FINANCE_APPROVED = 4;
    const STATUS_FINANCE_REJECTED = 5;

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('currentCompany', function (Builder $builder) {
            $builder->where('company_id',  auth()->user()->company_id);
        });
    }

    protected $table = 'salaries';
    protected $fillable = ['name','company_id', 'manager_id', 'user_id', 'balance_book_id','base_salary','commission_rate','commission_amount','status','manager_note','finance_note', 'start_date','end_date','approval_date'];

    // public $casts = [
    //     'start_date' => 'date',
    //     'end_date' => 'date',
    //     'approval_date' => 'data'
    // ];

    // * RELATIONSHIP


    public function sales() {
        return $this->hasMany(Sales::class, 'salary_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    // * MUTATORS

    public function getTotalAttribute() {
        return $this->base_salary + $this->commission_amount;
    }

    public function getStatusNameAttribute($value)
    {
        switch ($this->status) {
            case self::STATUS_DRAFT:
                return 'draft';
            case self::STATUS_MANAGER_APPROVED:
                return 'manager approved';
            case self::STATUS_FINANCE_PENDING:
                return 'finance pending';
            case self::STATUS_FINANCE_APPROVED:
                return 'approved';
            case self::STATUS_FINANCE_REJECTED:
                return 'rejected';
            default:
                return null;
        }
    }

    public function getStatusNameBadgeAttribute($value)
    {
        $class_name = '';
        switch ($this->status) {
            case self::STATUS_DRAFT:
                $class_name = 'bg-gray-100 text-gray-800';
                break;
            case self::STATUS_MANAGER_APPROVED:
                $class_name = 'bg-blue-100 text-blue-800';
                break;
            case self::STATUS_FINANCE_APPROVED:
                $class_name = 'bg-green-100 text-green-800';
                break;
            case self::STATUS_FINANCE_PENDING:
                $class_name = 'bg-yellow-100 text-yellow-800';
                break;
            case self::STATUS_FINANCE_REJECTED:
                $class_name = 'bg-red-100 text-red-800';
                break;
        }
        return "<span class='$class_name text-sm font-medium me-2 px-4 py-1 rounded'>$this->status_name</span>";
    }
}
