<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprendimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'rol_esfot',
        'nombre',
        'descripcion',
        'categoria',
        'direccion',
        'cobertura',
        'pagina_web',
        'telefono',
        'whatsapp',
        'facebook',
        'instagram',
        'porcentaje'
    
    ];
///Aqui
 public function getDefaultAvatarPath()
    {
        return "https://cdn-icons-png.flaticon.com/512/711/711769.png";
    }

    // Obtener la imagen de la BDD
    public function getAvatarPath()
    {
        // se verifica no si existe una iamgen
        if (!$this->image)
        {
            // asignarle el path de una imagen por defecto
            return $this->getDefaultAvatarPath();
        }
        // retornar el path de la imagen registrada en la BDD
        return $this->image->path;
    }

/////Aqui


    // Relación de uno a muchos
    // Un reporte le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación polimórfica uno a uno
    // Un reporte pueden tener una imagen
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
