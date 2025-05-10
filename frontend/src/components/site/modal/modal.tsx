'use client'

import style from './modal.module.css'
import { vehicleType } from '@/types/vehicle';

type ModalProps = {
  open: boolean;
  onClose: () => void;
  vehicle: vehicleType | null;
};

export default function Modal({ open, onClose, vehicle }: ModalProps) {
  if (!open || !vehicle) return null;

  return (
    <div className={style.modal}>
      <div className={style.modalContent}>
        <h2>{vehicle.nome}</h2>
        <hr />
        <p>Marca: {vehicle.marca}</p>
        <p>Ano: {vehicle.ano}</p>
        <p>Categoria: {vehicle.categoria.nome}</p>
        <p>Quantidade: {vehicle.quantidade}</p>
        <button onClick={onClose}>Fechar</button>
      </div>
    </div>
  );
}