'use client'

import { vehicleType } from '@/types/vehicle'
import style from './card.module.css'

interface vehicleProps{
  vehicle: vehicleType
  onClick?: () => void
}

export default function VehicleCard({vehicle, onClick}: vehicleProps) {
    return (
      <div className={style.card} onClick={onClick}>
        <div className={style.imagemContainer}>
          <img src={vehicle.imagem} alt='Imagem do veiculo' className={style.imagem}/>
        </div>
        <div className={style.infContainer}>
          <h3 className={style.marca}>{vehicle.marca}</h3>
          <p className={style.modelo}>Modelo: {vehicle.nome}</p>
          <p className={style.inf}>Ano: {vehicle.ano}</p>
          <p className={style.inf}>Categoria: {vehicle.categoria.nome}</p>
          <p className={style.inf}>Quantidade: {vehicle.quantidade}</p>
        </div>
      </div>
    )
  }