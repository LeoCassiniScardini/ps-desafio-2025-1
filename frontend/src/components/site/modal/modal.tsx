'use client'

import { useState } from 'react';
import style from './modal.module.css'
import { vehicleType } from '@/types/vehicle';
import { comprarVeiculo } from '@/actions/vehicle'
import { toast, useToast } from '@/components/use-toast'

interface Modal {
  isOpen: boolean;
  setOpen: (isOpen: boolean) => void;
  vehicle: vehicleType | null;
  requestVehicles: () => void;
};

export default function Modal({ isOpen, setOpen, vehicle, requestVehicles }: Modal) {
  if (isOpen || !vehicle) return null;

  const [quantidade, setQuantidade] = useState(0);

  const compra = async () => {
    try {
      const result = await JSON.parse(await comprarVeiculo(vehicle.id, quantidade));
  
      if (result?.error) {
        toast({
          title: 'Erro ao comprar!',
        });
      } else {
        toast({
          title: 'Compra realizada com sucesso!',
        });
        setOpen(!isOpen);
        requestVehicles();
      }
    } catch (error) {
      toast({
        title: 'Erro ao comprar!'+error,
      });
    }
  }


  return (
    <div className={style.modal}>
      <div className={style.modalContent}>
        <div className={style.modalHeader}>
          <h2>{vehicle.nome}</h2>
          <button className={style.closeButton} onClick={() => setOpen(!isOpen)}>x</button>
        </div>
        <hr className={style.spliter}/>
        <p>Marca: {vehicle.marca}</p>
        <p>Ano: {vehicle.ano}</p>
        <p>Categoria: {vehicle.categoria.nome}</p>
        <p>Quantidade: {vehicle.quantidade}</p>
        <div className={style.compra}>
          <input
            type="number"
            min={1}
            max={vehicle.quantidade}
            placeholder="0"
            value={quantidade}
            onChange={(e) => setQuantidade(Number(e.target.value))}
          />
          <button onClick={compra} disabled={quantidade < 1 || quantidade > vehicle.quantidade}>
            Comprar
          </button>
        </div>
      </div>
    </div>
  );
}