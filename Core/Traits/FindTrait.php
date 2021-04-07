<?php namespace Core\Traits;

trait FindTrait
{
    public function index()
    {
        $filters = $this->getFilters();
        $query = $this->entityManager->createQueryBuilder();
        $query->select('u');
        $query->from($this->modelName, 'u');

        if(is_null($filters))
            return $query->orderBy('u.id', 'ASC')->groupBy('u.id')->getQuery()->getArrayResult();        

        if(isset($filters['searchInLike']))
        {
            $query->where('u.'.$filters['searchInLike']['column'].' LIKE :'.$filters['searchInLike']['column'].'');
            $query->setParameter($filters['searchInLike']['column'], '%'.$filters['searchInLike']['key'].'%');
        }

        if(isset($filters['searchInExact']))
        {
            $query->where('u.'.$filters['searchInExact']['column'].' = :'.$filters['searchInExact']['column']);
            $query->setParameter($filters['searchInExact']['column'], $filters['searchInExact']['key']);
        }

        if(isset($filters['rangeBetween']))
        {
            $query->where('u.'.$filters['rangeBetween']['column'].' BETWEEN :first AND :second')
            ->setParameter('first', $filters['rangeBetween']['min'])
            ->setParameter('second', $filters['rangeBetween']['max']);
        }
        
        if(isset($filters['rangeLess']))
        {
            $query->where('u.'.$filters['rangeLess']['column'].' <= :range')
            ->setParameter('range', $filters['rangeLess']['value']);
        }

        if(isset($filters['rangeHigher']))
        {
            $query->where('u.'.$filters['rangeHigher']['column'].' >= :range')
            ->setParameter('range', $filters['rangeHigher']['value']);
        }
            
        if(isset($filters['orderBy']))
        {
            $query->orderBy('u.'.$filters['orderBy']['column'], $filters['orderBy']['order']); 
        }
        else{
            $query->orderBy('u.id', 'DESC');
        }
        
        $query->groupBy('u.id');

        return ['_data' => $query->getQuery()->getArrayResult()];
        
    }

    public function show()
    {
        $query = $this->entityManager->createQueryBuilder() 
                        ->select('u')
                        ->from($this->modelName, 'u')
                        ->where('u.id = :id')
                        ->setParameter('range', $this->getParameter('id'));

        return ['_data' => $query->getQuery()->getArrayResult()];
    }
}