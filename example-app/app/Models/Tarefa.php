<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $tablename = 'tarefas';

    protected $fillable = [
        'titulo','descricao','concluido','prazo','user_id','categoria_id'
    ];

    /**
     * Get the user that owns the Tarefa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo // uma tarefa pertence a um usuario
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the categoria that owns the Tarefa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria(): BelongsTo // uma tarefa pode ter varias categorias
    {
        return $this->belongsTo(User::class, 'categoria_id', 'id');
    }

}
